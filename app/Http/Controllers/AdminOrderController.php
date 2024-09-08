<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $order;
    private $orderDetail;
    public function __construct(){
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }
    public function index(){
        $orders = $this->order->where('status',1)->where('kind',1)->get();
        return view('admin.order.index',[
            'orders' => $orders
        ]);
    }

    public function detail($id) { // Order Detail
        $order = $this->order->find($id);
        // $orderDetail = $order->orderDetail()->get();

        $orderDetail = $this->orderDetail->select(
            'products.name as productName',
            'products.id as productId',
            'proattr.id as proattr_id',
            'proattr.color_id',
            'proattr.size_id',
            'attributes1.value as colorName',
            'attributes2.value as sizeName',
            'order_details.quantity',
            'order_details.price',
        )
        ->join('product_attributes as proattr', 'order_details.product_attribute_id', '=', 'proattr.id')
        ->join('products', 'proattr.product_id', '=', 'products.id')
        ->join('attributes as attributes1', 'proattr.color_id', '=', 'attributes1.id')
        ->join('attributes as attributes2', 'proattr.size_id', '=', 'attributes2.id')
        ->where('order_details.order_id',$order->id)
        ->orderBy('products.name')
        ->get();

        return view('admin.order.detail', [
            'order' => $order,
            'data' => $orderDetail,
        ]);
    }
    public function detailUpdate($id) {
        $staffId = auth()->guard('admin')->user()->id;
        $orderUpdate = $this->order->where('id', $id)->update([
            'kind' => 2,
            'id_saler' => $staffId
        ]);
        if($orderUpdate){
            return redirect()->route('order.ship');
        }
    }
    public function detailUpdateCancel($id) {
        $orderDetails = $this->orderDetail->where('order_id', $id)->get();
        if($orderDetails){
            foreach($orderDetails as $orderDetail)
            {
                //Lấy ra số lượng mẫu mã
                $productAttr = $orderDetail->productAttributes()->first();
                //Cộng số lượng sản phẩm trong chi tiết hóa đơn
                $qty = $productAttr->quantity + $orderDetail->quantity;
                //Lưu lại trong sản phẩm
                $productAttr->update(['quantity'=> $qty]);
    
            }
            $this->order->where('id', $id)
                ->update([
                    'id_saler'=> auth()->guard('admin')->user()->id, 
                    'kind' => 4
                ]);
        }
        return redirect()->route('admin.order.index');
    }

    public function ship() {
        $orders = $this->order->where('status',1)->where('kind',2)->get();
        return view('admin.order.ship',[
            'orders' => $orders
        ]);
    }

    public function shipUpdate($id) {
        $this->order
            ->where('id', $id)
            ->update([
                'kind' => 3
            ]);

        return redirect()->back();
    }
    public function shipCancel($id) {
        $orderDetails = $this->orderDetail->where('order_id', $id)->get();
        if($orderDetails){
            foreach($orderDetails as $orderDetail)
            {
                //Lấy ra số lượng mẫu mã
                $productAttr = $orderDetail->productAttributes()->first();
                //Cộng số lượng sản phẩm trong chi tiết hóa đơn
                $qty = $productAttr->quantity + $orderDetail->quantity;
                //Lưu lại trong sản phẩm
                $productAttr->update(['quantity'=> $qty]);
    
            }
            $this->order->where('id', $id)
                ->update([
                    'id_saler'=> auth()->guard('admin')->user()->id, 
                    'kind' => 4
                ]);
        }
        return redirect()->back();

    }
    public function bill() {
        $orders = $this->order
            ->where('status', 1)
            ->where('kind', 3)
            ->get();
        return view('admin.order.order_bill', [
            'orders' => $orders,
        ]);
    }
    public function cancel() {
        $orders = $this->order
            ->where('status', 1)
            ->where('kind', 4)
            ->get();
        return view('admin.order.order_cancel', [
            'orders' => $orders,
        ]);
    }
}
