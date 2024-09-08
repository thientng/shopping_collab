<?php

namespace App\Http\Controllers;
use App\Components\Recursive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\Attribute;
use App\Models\ProductAttribute;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Log;
use DB;
use App\Http\Requests\ProductAddRequest;



class AdminProductController extends Controller
{
    private $recursive; 
    private $category;
    private $products;
    private $productImage;
    private $tags;
    private $productTag;
    private $attribute;
    private $productAttribute;
    

    use StorageImageTrait; // Nếu muốn sử dụng Trait thì viết use nằm trong class đag dùng không cần viết đường dẫn App\Trait\tên trait

    public function __construct() {
        $this->category = new Category();
        $this->products = new Product();
        $this->productImage = new ProductImage();
        $this->tags = new Tag();
        $this->productTag = new ProductTag();
        $this->attribute = new Attribute();
        $this->productAttribute = new ProductAttribute();


        $this->recursive = new Recursive($this->category->all());
    }

    public function index() {
        $products = $this->products->latest()->get();
        // echo '<pre>';
        // $hehe = [];
        // foreach($products as $product){

        //     foreach ($product->productAttribute as $proAttr) {
        //         $hehe[]  = [
        //             $proAttr->id,
        //             $proAttr->product_id,
        //             $proAttr->quantity,
        //         ];
        //     }
        // }
        // print_r($hehe);
        return view('admin.product.index',[
            'products' => $products,
        ]);
    }
    public function create() {
        $htmlOptions = $this->recursive->categoryRecursiveTagOption();
        $colorOptions = $this->attribute->where('name','color')->get();
        $sizeOptions = $this->attribute->where('name','size')->get();

        return view('admin.product.add',[
            'htmlOptions' => $htmlOptions,
            'colorOptions' => $colorOptions,
            'sizeOptions' => $sizeOptions,
        ]);
    }
    public function store(ProductAddRequest $request) { // xử lí add dữ liệu, Khai báo bằng ProductAddRequest vì để validate 
        
        try { // Bảo vệ tính toàn vẹn của dữ liệu, vì khi thêm dữ liệu có nhiều bảng liên kết với nhau nhưng khi chỉ sảy ra lỗi ở 1 bảng thì các bảng còn lại gây thiết sót sai dữ liệu vì vậy khi cùng try catch nếu gặp lỗi thì sẽ rollback lại toàn bộ dữ liệu như cũ
            
            // Nếu insert dữ liệu từ DB::beginTransaction(); đến  DB::commit(); có phần nào lỗi thì khi dùng try catch thì gặp lỗi sẽ nhảy sang catch và sẽ chạy DB::rollBack(); để rollback lại dữ liệu các bảng vì có lỗi 
            DB::beginTransaction();
                $dataProductUpdate =[
                    'name' => $request->name,
                    'price' => $request->price,
                    'content' => $request->contents,
                    'user_id' => auth()->guard('admin')->user()->id,
                    'category_id' => $request->category,
                ];

                // phương thức xử lí upload 1 file 
                $dataUploadFeaturedImage = $this->storageTraitUpload($request,'feature_image_path','product'); // gọi thẳng phương thức của trait StorageImageTrait vừa use bàng this->

                if(!empty($dataUploadFeaturedImage)){ // thêm ảnh avata vào product
                    $dataProductUpdate['feature_image_path'] = $dataUploadFeaturedImage['file_path'];
                    $dataProductUpdate['feature_image_name'] = $dataUploadFeaturedImage['file_name'];
                }
                
                $product = $this->products->create($dataProductUpdate);
                // dd($product);

                // thêm chi tiết ảnh sản phẩm (thêm vào bảng product_image riêng nhưng cùng một lần)
                if($request->hasFile('image_path')){ // hasFile() kiểm tra xem đã cho file vào Request đã chỉ định(name input) hay chưa 
                    foreach($request->image_path as $fileItem){
                        $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product'); // phương thức xử lí multipal file
                        // $this->productImage->create([
                        //     'product_id' => $product->id, // vì mảng $dataProductUpdate được thêm dữ liệu vào bảng products trước sau đó bảng product_images sẽ lấy được id của sản phẩm từ dữ liệu vừa insert trong mảng $dataProductUpdate 
                        //     'image_name' => $dataProductImageDetail['file_name'],
                        //     'image_path' => $dataProductImageDetail['file_path'],
                        // ]);

                        // Cách 2 : Tìm hiểu Eloquent: Relationships, không cần add id nó nhận diện vì là khóa ngoại viết trong Model Product
                        $product->images()->create([
                            'image_name' => $dataProductImageDetail['file_name'],
                            'image_path' => $dataProductImageDetail['file_path'],
                        ]);
                    
                    }
                }

                // insert tags cho product
                $tagsId = [];
                if(!empty($request->tags)){ // kiểm tra xem có trá trị truyền vào k
                    foreach($request->tags as $tag) {
                        // thêm tag vào trong bảng tags
                        $tagInstance = $this->tags->firstOrCreate([ // giống hàm create() để thêm dữ liệu vào bảng, nhưng trả về bản ghi nếu nó tồn tại. Nếu bản ghi không tồn tại, phương thức sẽ tạo một bản ghi mới với các thuộc tính được chỉ định và lưu trữ nó vào cơ sở dữ liệu. Đảm bảo tính duy nhất(unique) của dữ liệu khi thêm vào
                            'name' => $tag,
                        ]); // đặt tên biến thêm chữ Instance ở đằng sau thường dùng để lưu 1 bản ghi(1 row dữ liệu)
            
                        // thêm product_id và tag_id vào bảng product_tags
                        // Cách : 1
                        // $this->productTag->create([
                        //     'product_id' => $product->id,
                        //     'tag_id' => $tagInstance->id, // biến tagInstance lưu Bản ghi vừa tạo, hoặc bản ghi được trả về vì đã tồn tại 
                        // ]);

                        // Cách : 2 
                        $tagsId[]= $tagInstance['id']; // lưu id các tag vừa tạo vào xog mảng
                        
                    }
                    // C 2 : tiếp
                    $product->tags()->attach($tagsId); // thêm dữ liệu (id của 2 cột khóa ngoại product_id và tag_id) vào bảng trung gian product_tags, attach() dùng để thêm các bản ghi liên quan vào mối quan hệ many to many
                }

                // if(){
                     
                // }
            DB::commit();

            return redirect()->route('product.index');
            
        } catch(\Exception $exception) { // nếu lỗi sẽ chạy catch
            DB::rollBack();
            
            Log::error('Message : '. $exception->getMessage().'. Line : '.$exception->getLine()); // vào storage/logs/.. để xem lỗi được in ra
            // return redirect()->back();

        }
    }

    function getCategory($parentId = ''){ // hàm lấy danh mục sản phẩm (tiện dùg chugn)
        $data = $this->category->all();
        $recursive = new Recursive($data); 
        return $recursive->categoryRecursiveTagOption($parentId);
    }

    public function edit($id) {
        $product = $this->products->find($id);
        $htmlOptions = $this->getCategory($product->category_id);
        return view('admin.product.edit',[
            'htmlOptions' => $htmlOptions,
            'product' =>$product,
        ]);
    }

    public function update($id, Request $request) {
        try { // Bảo vệ tính toàn vẹn của dữ liệu, vì khi thêm dữ liệu có nhiều bảng liên kết với nhau nhưng khi chỉ sảy ra lỗi ở 1 bảng thì các bảng còn lại gây thiết sót sai dữ liệu vì vậy khi cùng try catch nếu gặp lỗi thì sẽ rollback lại toàn bộ dữ liệu như cũ
            
            // Nếu insert dữ liệu từ DB::beginTransaction(); đến  DB::commit(); có phần nào lỗi thì khi dùng try catch thì gặp lỗi sẽ nhảy sang catch và sẽ chạy DB::rollBack(); để rollback lại dữ liệu các bảng vì có lỗi 
            DB::beginTransaction();
                $dataProductUpdate =[
                    'name' => $request->name,
                    'price' => $request->price,
                    'content' => $request->contents,
                    'user_id' => auth()->guard('admin')->user()->id,
                    'category_id' => $request->category_id,
                ];

                // phương thức xử lí upload 1 file 
                $dataUploadFeaturedImage = $this->storageTraitUpload($request,'feature_image_path','product'); // gọi thẳng phương thức của trait StorageImageTrait vừa use bàng this->

                if(!empty($dataUploadFeaturedImage)){ // thêm ảnh avata vào product
                    $dataProductUpdate['feature_image_path'] = $dataUploadFeaturedImage['file_path'];
                    $dataProductUpdate['feature_image_name'] = $dataUploadFeaturedImage['file_name'];
                }

                $this->products->find($id)->update($dataProductUpdate); // update trả về kiểu dữ liệu boolean k trả về bản ghi, find() thường dùng để tìm 1 phần tử, còn where thì nhiều
                $product = $this->products->find($id);
                // thêm chi tiết ảnh sản phẩm (thêm vào bảng product_image riêng nhưng cùng một lần)
                if($request->hasFile('image_path')){ // hasFile() kiểm tra xem đã cho file vào Request đã chỉ định(name input) hay chưa 
                    $this->productImage->where('product_id', $id)->delete();

                    foreach($request->image_path as $fileItem){
                        $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product'); // phương thức xử lí multipal file
                        // $this->productImage->create([
                        //     'product_id' => $product->id, // vì mảng $dataProductUpdate được thêm dữ liệu vào bảng products trước sau đó bảng product_images sẽ lấy được id của sản phẩm từ dữ liệu vừa insert trong mảng $dataProductUpdate 
                        //     'image_name' => $dataProductImageDetail['file_name'],
                        //     'image_path' => $dataProductImageDetail['file_path'],
                        // ]);

                        // Cách 2 : Tìm hiểu Eloquent: Relationships, không cần add id nó nhận diện vì là khóa ngoại viết trong Model Product
                        $product->images()->create([
                            'image_name' => $dataProductImageDetail['file_name'],
                            'image_path' => $dataProductImageDetail['file_path'],
                        ]);
                    
                    }
                }

                // insert tags cho product
                $tagsId = [];
                if(!empty($request->tags)){ // kiểm tra xem có trá trị truyền vào k
                    foreach($request->tags as $tag) {
                        // thêm tag vào trong bảng tags
                        $tagInstance = $this->tags->firstOrCreate([ // giống hàm create() để thêm dữ liệu vào bảng, nhưng trả về bản ghi nếu nó tồn tại. Nếu bản ghi không tồn tại, phương thức sẽ tạo một bản ghi mới với các thuộc tính được chỉ định và lưu trữ nó vào cơ sở dữ liệu. Đảm bảo tính duy nhất(unique) của dữ liệu khi thêm vào
                            'name' => $tag,
                        ]); // đặt tên biến thêm chữ Instance ở đằng sau thường dùng để lưu 1 bản ghi(1 row dữ liệu)
            
                        // thêm product_id và tag_id vào bảng product_tags
                        // Cách : 1
                        // $this->productTag->create([
                        //     'product_id' => $product->id,
                        //     'tag_id' => $tagInstance->id, // biến tagInstance lưu Bản ghi vừa tạo, hoặc bản ghi được trả về vì đã tồn tại 
                        // ]);

                        // Cách : 2 
                        $tagsId[]= $tagInstance['id']; // lưu id các tag vừa tạo vào xog mảng
                        
                    }
                }
                // C 2 : tiếp
                $product->tags()->sync($tagsId); // thêm dữ liệu (id của 2 cột khóa ngoại product_id và tag_id) vào bảng trung gian product_tags, sync() dùng để thêm các bản ghi, nếu dữ liệu thêm vào đã tồn tại thì sẽ không thêm mới, còn nếu chưa tồn tại thì sẽ thêm, dùng vs mối quan hệ many to many, 
            DB::commit();

            return redirect()->route('product.index');

        } catch(\Exception $exception) { // nếu lỗi sẽ chạy catch
            DB::rollBack();

            Log::error('Message : '. $exception->getMessage().'. Line : '.$exception->getLine()); // vào storage/logs/.. để xem lỗi được in ra
        }
    }

    public function delete($id){
        try {
            $this->products->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ],200);

        } catch(\Exception $exception) { // nếu lỗi sẽ chạy catch
            Log::error('Message : '. $exception->getMessage().'. Line : '.$exception->getLine()); // vào storage/logs/.. để xem lỗi được in ra
            return response()->json([
                'code' => 500,
                'message' => 'error',
            ],500);
        }
    }


    public function detail($id){
        try {
            $product = $this->products->findOrFail($id); //Nếu bản ghi không tồn tại, nó sẽ kích hoạt một ngoại lệ (exception) kiểu Illuminate\Database\Eloquent\ModelNotFoundException
            // Nếu sản phẩm có tồn tại, bạn có thể sử dụng biến $product ở đây 
            
            $attributesColor = $this->attribute->where('name', "color")->get();
            $attributesSize = $this->attribute->where('name', "size")->get();
            return view('admin.product.detail.index',[
                'product' => $product,
                'attributesColor' => $attributesColor,
                'attributesSize' => $attributesSize,
            ]);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Xử lý khi không tìm thấy sản phẩm
            echo "Không tìm thấy sản phẩm với ID = $id";
        }
    }
    public function detailSave($id,Request $request){
        $productDetail = $this->productAttribute
        ->where([
            ['product_id', '=', $id],
            ['color_id', '=', $request->color],
            ['size_id', '=', $request->size],
        ])
        ->get();
        if($productDetail->count() === 0){
            $productDetailAdd = [
                'product_id' => $id,
                'color_id' => $request->color,
                'size_id' => $request->size,
                'price' => $request->price,
                'quantity' => 0,
                'image' => str_replace(env('APP_URL'), '/', $request->filepath),
            ];
            // dd($productDetailAdd['image']);

            return $this->productAttribute->create($productDetailAdd) ? redirect()->back() : '';
        }

        return redirect()->back();
    }
    public function detailDelete(){

    }

}
