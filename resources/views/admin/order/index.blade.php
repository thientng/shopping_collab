@extends('layouts.admin')

@section('title')
<title>
    Đơn đặt hàng
</title>
@endsection

@section('title_header-page')
    Đơn đặt
@endsection

@section('title_key_header-page')
    view
@endsection


@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn nhập hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr >
                            <th style="width: 5%">Mã</th>
                            <th style="width: 25%">Khách hàng</th>
                            <th style="width: 30%">Tổng tiền</th>
                            <th style="width: 45%">Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $x=0 @endphp

                            @foreach ($orders as $order)
                            <tr onclick="window.location='{{ route('order.detail', ['id' => $order->id]) }}';">
                                <th>{{ $x+=1 }}</th>
                                <th>{{ $order->name }}</th>
                                <th>{{ number_format($order->total_money) }} ₫</th>
                                <th>{{ $order->created_at }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('vendors\datatables\configDataTable.js') }}"></script>
@endsection

