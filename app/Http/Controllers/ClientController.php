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
use App\Components\Recursive;

class ClientController extends Controller
{
    private $product;
    private $category;
    private $menu;
    private $slider;
    private $tag;
    private $productTag;
    public function __construct(){
        $this->product = new Product();
        $this->category = new Category();
        $this->menu = new Menu();
        $this->slider = new Slider();
        $this->tag = new Tag();
        $this->productTag = new ProductTag();
    }
    public function index(){
        $categories = $this->category->latest()->get();
        $menus = $this->menu->where('parent_id',0)->take(5)->get();
        $sliders = $this->slider->latest()->take(4)->get();
        $productsRecommend = $this->product->latest('views_count','desc')->where('category_id',13)->take(4)->get();
        $productsMan = $this->product->latest('views_count','desc')->where('category_id',14)->take(4)->get();
        // $products = $this->product->latest()->get();
        $products = $this->product->latest('views_count','desc')->where('category_id',13)->take(4)->get();
        return view('client_view.home.index',[
            'productsMan' => $productsMan,
            'products' => $products,
            'categories' => $categories,
            'menus' => $menus,
            'sliders' => $sliders,
        ]);
    }


    public function shop(Request $request){
        $id = $request->input('id');
        $products = $this->product->latest()->paginate(9);
        $categoryParent = $this->category->latest()->where('parent_id',0)->get();
        $menus = $this->menu->latest()->take(4)->get();
        if(isset($request->search)){
            $products = $this->product->where('name', 'like', '%' . $request->search . '%')->orWhere('price', $request->search)->paginate(9);
        }
        // if($id !== null){
        //     $products = $this->product->where('category_id',$id)->paginate(9);
        // }

        return view('client_view.shop.shop',[
            'categories' => $categoryParent,
            'menus' => $menus,
            'products' => $products,
        ]);
    }

    public function productDetail($id){
        
        $categories =$this->category->get();

        $product = $this->product->find($id);

        $tags = $product->tags;
        $colors = $product->colors->unique();
        $sizes = $product->sizes->unique();
        if($product){
            $this->product->find($id)->update(['views_count' => $product->views_count + 1 ]);
    
            return view('client_view.single_product.index',[
                'categories'=> $categories,
                'product'=> $product,
                'tags' => $tags,
                'colors' => $colors,
                'sizes' => $sizes,
            ]);
        }
    }

    public function quantityCheck($id,ProductAttribute $productAttribute){
        
        $productAttribute = $productAttribute->where('color_id',$id)->get();
        if($productAttribute){
            $sizeQuantity = [];
            foreach($productAttribute as $item){
                $sizeQuantity[] = [
                    'size_id' => $item->size_id,
                    'quantity' =>$item->quantity,
                ];
            }

            return response()->json([
                'sizeQuantity' => $sizeQuantity,
                'code'=>200,
            ],200);
        
        }
        
        // dd($sizeQuantity);

    }


    public function cart() {
        $cart = session('cart');
        // $cartTotalAmount = 0;
        // foreach ($cart as $cartItem) {
        //     $cartTotalAmount += $cartItem['price'] * $cartItem['quantity'];
        // }
        return view('client_view.cart.index',[
            'cart' => $cart,
            // 'cartTotalAmount' => $cartTotalAmount
        ]);
    }

    public function addToCart($id, Request $request){
        // Session()->forget('cart');
        // Session()->flush(); // xóa tất session
        // dd('hehe');
        $cart = session('cart'); // giống get

        $product = ProductAttribute::select(
            'products.name as productName',
            'products.id as productId',
            'products.price as price',
            'products.sale_price as sale_price',
            'products.feature_image_path as feature_image_path',
            'product_attributes.id as proattr_id',
            'product_attributes.color_id',
            'product_attributes.size_id',
            'product_attributes.image as image',
            'product_attributes.quantity as quantity',
            'attributes1.value as colorName',
            'attributes2.value as sizeName'
        )
        ->join('products', 'product_attributes.product_id', '=', 'products.id')
        ->join('attributes as attributes1', 'product_attributes.color_id', '=', 'attributes1.id')
        ->join('attributes as attributes2', 'product_attributes.size_id', '=', 'attributes2.id')
        ->where('products.id',$id)
        ->where('product_attributes.color_id',$request->input('colorId'))
        ->where('product_attributes.size_id',$request->input('sizeId'))
        ->first();

        $attrId = $product->proattr_id;

        if (isset($cart[$attrId]['attrId']) ) {

            $cart[$attrId]['quantity'] += $request->input('quantity');

        } else {

            $quantity = $request->input('quantity');
            if ($product) {
                $cart[$attrId] = [
                    'attrId' => $product->proattr_id,
                    'name' => $product->productName,
                    'price' => !empty($product->sale_price) ? $product->sale_price : $product->price,
                    'color' => $product->colorName,
                    'size' => $product->sizeName,
                    'image' => $product->image ? $product->image : $product->feature_image_path,
                    'quantity' => $quantity ? $quantity : 1,
                    'maxQuantity' => $product->quantity
                ];
            } else {
                return response()->json(['error' => 'Product not found'], 404);
            }
        }
        // session()->forget('cart');

        session(['cart' => $cart]); // giống put
        // dd(session('cart'));
        


        return response()->json([
            'code' => 200,
            'message' => 'Thành Công',
            // 'cart' =>   $cart,
        ],200);
    }

    public function updateCart(Request $request){
        // dd($request->quantity);
        if(!empty($request->id) && !empty($request->quantity)){
            $cart = session('cart');
            $cart[$request->id]['quantity'] = $request->quantity;

            session(['cart' => $cart]);
            $cartView = view('client_view.cart.components.cart_box',[
                'cart' => $cart
            ])->render();
            return response()->json([
                'cartView'=>$cartView,
                'code'=>200,
                'quantity'
            ],200);
        }
    }
    public function deleteCart(Request $request){
        if(!empty($request->id)){
            $cart = session('cart');
            // unset xóa phần tử chứ id khỏi mảng card
            unset($cart[$request->id]);

            session(['cart' => $cart]);

            $cartView = view('client_view.cart.components.cart_box',[
                'cart' => $cart
            ])->render();
            return response()->json([
                'cartView'=>$cartView,
                'code'=>200
            ],200);
        }
    }

}
