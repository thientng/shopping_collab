<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use App\Models\ImportBill;
use App\Models\ImportDetail;
use DB;
use Log;
use Session;


class ImportProductController extends Controller
{
    private $product;
    private $attribute;
    private $productAttribute;
    private $importBill;
    private $importDetail;

    public function __construct(Attribute $attribute){
        $this->attribute = $attribute;

        $this->product = new Product();
        $this->productAttribute = new ProductAttribute();
        $this->importBill = new ImportBill();
        $this->importDetail = new ImportDetail();
    }
    public function index(){
        return view('admin.import.index', [
            'importBills' => ImportBill::all()
        ]);
    }
    public function add(){
        $attributesColor = $this->attribute->where('name', "color")->get();
        $attributesSize = $this->attribute->where('name', "size")->get();
        
        $products = ProductAttribute::select(
            'products.name as productName',
            'products.id as productId',
            'product_attributes.id as proattr_id',
            'product_attributes.color_id',
            'product_attributes.size_id',
            'attributes1.value as colorName',
            'attributes2.value as sizeName'
        )
        ->join('products', 'product_attributes.product_id', '=', 'products.id')
        ->join('attributes as attributes1', 'product_attributes.color_id', '=', 'attributes1.id')
        ->join('attributes as attributes2', 'product_attributes.size_id', '=', 'attributes2.id')
        ->orderBy('products.name')
        ->get();

        return view('admin.import.add',[
            'products' => $products,

            'attributesColor' => $attributesColor,
            'attributesSize' => $attributesSize
        ]);
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();

            $totalMoney = 0;
            for ($i = 0; $i < count($request->productModel); $i++){
                $totalMoney += $request->quantity[$i] * $request->price[$i];
            }
            
            $importBill = $this->importBill->create([
                'id_user' => auth()->guard('admin')->id(),
                'total_money' => $totalMoney,
            ]);

            $dataDetail = [];
            for ($i = 0; $i < count($request->productModel); $i++) {
                //Lấy ra id theo tên mặt hàng
                $id_product_attribute = $this->productAttribute
                ->where('product_id', $request->productId[$i])
                ->where('color_id', $request->color[$i])
                ->where('size_id', $request->size[$i])
                ->value('id');
                
                $dataDetail[]= [
                    'id_import_bill' => $importBill->id,
                    'id_product_attribute' => $id_product_attribute,
                    'import_quantity' => $request->quantity[$i],
                    'price' => $request->price[$i],
                ];
            }

            $this->importDetail->insert($dataDetail);

            //Tăng số lượng trong bảng mẫu mã sản phẩm
            $importDetails = $this->importDetail->where('id_import_bill', $importBill->id)->get();

            foreach ($importDetails as $key => $importDetail) {
                //Lấy ra số lượng của mẫu mã
                $productAttribute =$this->productAttribute->find($importDetail->id_product_attribute);
                $quantity = $importDetail->import_quantity + $productAttribute->quantity; // cũ + mới
                
               $this->productAttribute
                    ->find($importDetail->id_product_attribute)
                    ->update(['quantity' => $quantity]);
            }

            
            DB::commit();
            Session::flash('success', 'Nhập hàng thành công');
            return redirect()->back();
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Message : '. $err->getMessage().'. Line : '.$err->getLine()); // vào storage/logs/.. để xem lỗi được in ra
            Session::flash('error', 'Nhập hàng lỗi');
        }

        // return redirect()->route('product');
    }
    public function save(){

    }
    public function detail($id){
        $hoadonnhap = $this->importBill->find($id);
        
        $importDetail = ImportDetail::select(
            'products.name as productName',
            'products.id as productId',
            'proattr.id as proattr_id',
            'proattr.color_id',
            'proattr.size_id',
            'attributes1.value as colorName',
            'attributes2.value as sizeName',
            'import_details.import_quantity',
            'import_details.price',
        )
        ->join('product_attributes as proattr', 'import_details.id_product_attribute', '=', 'proattr.id')
        ->join('products', 'proattr.product_id', '=', 'products.id')
        ->join('attributes as attributes1', 'proattr.color_id', '=', 'attributes1.id')
        ->join('attributes as attributes2', 'proattr.size_id', '=', 'attributes2.id')
        ->where('import_details.id_import_bill',$id)
        ->orderBy('products.name')
        ->get();

        return view('admin.import.import_detail', [
            'hoadon' => $hoadonnhap,
            'data' => $importDetail,
        ]);
    }
    // public function productModel($id,Request $request){
    //     dd($productModelHtml = $request->input('html'));
    //     $product = $this->product->find($id);
    //     $attributesColor = $product->productAttributeColor;
    //     $attributesSize = $product->productAttributeSize;
    //     $productModelView = view('admin.import.components.product_model',[
    //         'attributesColor' => $attributesColor,
    //         'attributesSize' => $attributesSize,
    //         'productModelHtml' => $productModelHtml,
    //     ])->render();

    //     return response()->json([
    //         'productModelView' =>$productModelView,
    //         'productModelHtml' => $productModelHtml,
    //         'code'=>200,
    //     ],200);
    // }
}
