@extends('layouts.admin')

@section('title')
<title>
    Hóa đơn thêm hàng
</title>
@endsection

@section('title_header-page')
    Hóa đơn nhập hàng
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
                            <th style="width: 25%">Nhân viên</th>
                            <th style="width: 30%">Tổng tiền</th>
                            <th style="width: 45%">Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $x=0
                        @endphp
                        @foreach ($importBills as $item)
                        @php
                            $x+=1
                        @endphp
                        <tr onclick="window.location='{{ route('import.detail', ['id' => $item->id]) }}';">
                            <th>{{ $x }}</th>
                            <th>{{ optional($item->users)->name }}</th>
                            <th>{{ $item->total_money }}</th>
                            <th>{{ $item->created_at }}</th>
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
@endsection

@section('script')
<script src="{{ asset('vendors\datatables\configDataTable.js') }}"></script>
@endsection
