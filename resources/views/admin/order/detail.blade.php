@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="h3 mb-2 text-gray-800">Thông tin đơn hàng</h3>
            </div>
            <div class="card-body">
                <h4>Khách hàng:
                    {{ optional($order)->name }}
                </h4>
                <h4>Số điện thoại: {{$order->phone}} </h4>
                <h5>Địa chỉ: {{$order->address}}</h5>
                <h4>Thời gian: {{$order->created_at}}</h4>
                <h4>Tổng tiền: {{number_format($order->total_money)}} ₫</h4>
                <h5>Ghi chú:</h5>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="width: 5%">STT</th>
                            <th style="width: 50%">Mẫu mã sản phẩm</th>
                            <th style="width: 25%">Số lượng</th>
                            <th style="width: 20%">Giá (VND)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $x=0
                        @endphp
                        @foreach($data as $item)
                            @php
                                $x+=1
                            @endphp
                            <tr>
                                <th>{{$x}}</th>
                                <th>{{ $item->productName . ' (' . $item->colorName . ' - ' . $item->sizeName . ')' }}</th>
                                <th> {{$item->quantity}}</th>
                                <th>{{$item->price}}</th>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a style="display: inline-block; float: left" href="{{ route('order.index') }}" class="btn btn-primary btn-user btn-block col-lg-1">Trở về</a>
    
    
                <a style="display: inline-block;  float: right" href="{{ route("order.detail-update",['id'=> $order->id]) }}" class="btn btn-primary btn-user btn-block col-lg-2">Xác nhận vận chuyển</a>
    
                <a style="display: inline-block; margin-right: 10px; float: right; " href="{{ route("order.detail-cancel",['id'=> $order->id]) }}" class="btn btn-primary btn-user btn-block col-lg-2">Hủy đơn hàng</a>
            </div>
        </div>
    </div>
@endsection

@section('css')
<link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('script')
{{-- Datatables --}}
<script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function() {
  $('#dataTable').DataTable({
    "lengthMenu": [5, 15, 25,50,150], // Specify the available page lengths
    "pageLength": 5, // Set the initial number of rows per page
    "searching": true,
    "searchDelay": 500,
    "columns": [
        null, // Cột 1 (Mã)
        { "searchable": true }, // Cột 2 (Nhân viên)
        { "searchable": true }, // Cột 3 (Tổng tiền)
        { "searchable": true }, // Cột 4 (Thời gian)
    ]
  });
});
</script>
@endsection