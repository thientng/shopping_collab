<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ClientCategoryController extends Controller
{
    private $product;
    private $category;
    public function __construct(){
        $this->product= new Product();
        $this->category= new Category();
    }
    public function index($slug,$id){
        $categories = $this->category->where('parent_id', 0)->get();
        $products = $this->product->where('category_id',$id)->paginate(9);
        return view('client_view.product.category.list',[
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
