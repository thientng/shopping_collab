@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="h3 mb-2 text-gray-800">Chi tiết hóa đơn nhập {{$hoadon->id}}</h3>
            </div>
            <div class="card-body">
                <h4>Nhân viên:
                    {{ optional($hoadon->users)->name }}
                </h4>
                <h4>Tổng tiền: {{$hoadon->total_money}}</h4>
                <h4>Thời gian: {{$hoadon->created_at}}</h4>
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
                                <th> {{$item->import_quantity}}</th>
                                <th>{{$item->price}}</th>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </div>
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