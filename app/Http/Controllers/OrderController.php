<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    private $order;
    private $orderDetail;
    public function __construct(){
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }
    public function index(){
        if(!empty(session('cart'))){
            $cart = session('cart');
            return view('client_view.check_out.index',[
                'cart' => $cart,
            ]);
        }
        return redirect()->route('home');
    }
    public function store(Request $request){
        $data = [
            'kind' => 1,
            'id_customer' => $request->product_id ? $request->product_id : null,
            'id_saler' => null,
            'total_money' => $request->totalAll,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $order = $this->order->create($data);
        if($order){

            $tokenOrder = Str::random(40);
            $cart = session('cart');

            $dataDetail = [];
            foreach($cart as $item){
                $dataDetail[] = [
                    'order_id' => $order->id,
                    'product_attribute_id' => $item['attrId'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            $orderDetail = $this->orderDetail->insert($dataDetail);

            $order->token= $tokenOrder;
            $order->save();
            // dd($order->email);
            Mail::to($order->email)->send(new OrderMail($tokenOrder,$order->id));

            return redirect()->back()->with('addOrder','Đặt hàng thành công');
        }
    }

    public function verify($token,$id){
        $order = $this->order->where('token',$token)->where('id',$id)->first();

        if($order){
            $orderDetail = $order->orderDetail()->get();
            
            foreach($orderDetail as $item){
                $attrQuantityUpdate = $item->productAttributes->quantity - $item->quantity;
                $item->productAttributes()->update(['quantity' => $attrQuantityUpdate]);

            }
            
            session()->forget('cart');
            $order->status = 1;
            $order->token = null;
            $order->save();

            if(auth()->guard('guest')->check()){

            } else {
                return redirect()->route('home')->with('addOrder','Đặt hàng thành công');
            }
        }

        return abort(404);
    }
}
