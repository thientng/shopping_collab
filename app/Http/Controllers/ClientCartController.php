<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Models\ProductAttribute;

class ClientCartController extends Controller
{
    private $product;
    private $category;
    private $tag;
    private $productTag;
    public function __construct(){
        $this->product = new Product();
        $this->category = new Category();
        $this->tag = new Tag();
        $this->productTag = new ProductTag();
    }

    public function productCart($id){
        $categories =$this->category->get();

        $product = $this->product->find($id);
        $tags = $product->tags;
        $colors = $product->colors->unique();
        $sizes = $product->sizes->unique();
        if($product){
            $this->product->find($id)->update(['views_count' => $product->views_count + 1 ]);
    
            $productModal = view('client_view.components.product_popup.product_detail',[
                'categoriesCart'=> $categories,
                'productCart'=> $product,
                'tagsCart'=> $tags,
                'colorsCart'=> $colors,
                'sizesCart'=> $sizes,
            ])->render();

            $layoutClient = view('layouts.client_view')->render();

            return response()->json([
                'productModal' => $productModal,
                'layoutClient' => $layoutClient,
                'code'=>200,
            ],200);
        }
    }
}
