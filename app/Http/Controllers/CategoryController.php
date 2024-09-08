<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Components\Recursive;
// use Illuminate\Pagination\LengthAwarePaginator;

use App\Traits\DeleteModelTrait;


class CategoryController extends Controller
{
    use DeleteModelTrait;

    private $category;

    public function __construct(Category $category) { // khởi tạo một đối tượng thuộc lớp Category vào tham số
        $this->category = $category;
    }


    public function index() {

        $categories = $this->category->latest()->paginate(5);// lấy theo thời gian mới nhất và lấy 5 bản ghi trên 1 trang(phân trang)


        return view("admin.category.index",[
            'categories' => $categories,
        ]);
    }

    public function getCategory($parentId = ''){ // hàm lấy danh mục sản phẩm (tiện dùg chugn)
        $data = $this->category->all();
        $recursive = new Recursive($data); 
        return $recursive->categoryRecursiveTagOption($parentId);
    }

    public function create() { 
        $htmlOption = $this->getCategory();
        // return view('admin.category.add', compact('htmlOption'));
        return view('admin.category.add', ['htmlOption' => $htmlOption]);
    }

    public function store(Request $request) {  // store dùng để xử lí dữ liệu ở route create khi tạo danh mục
        // Request dùng để lưu tất cả các dữ liệu được gửi từ form dùng cho cả 2 phương thức get và post
        $this->category->create([ // hàm create dùng để insert dữ liệu vào DB
            'name' => $request->category_name, // 'tên trường' => $request->tên trong thẻ input
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->category_name)
        ]);

        return redirect()->route('category.index'); // hàm redirect dùng để điều hướng trang
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category['parent_id']);

        return view('admin.category.edit',[
            'id' => $id,
            'category' => $category,
            'htmlOption' => $htmlOption,
        ]);
    }

    public function update($id,Request $request) {
        
        $this->category->find($id)->update([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->category_name)
        ]);

        return redirect()->route('category.index');
    }
    public function delete($id) {
        $this->category->find($id)->delete();

        return redirect()->route('category.index');
    }

}