@extends('layouts.admin')

@section('title')
<title>
    Đơn hóa đơn đặt hàng
</title>
@endsection

@section('title_header-page')
    Đơn hóa đơn đặt
@endsection

@section('title_key_header-page')
    view
@endsection


@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn đặt hàng thành công</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr >
                            <th style="width: 5%">Mã</th>
                            <th style="width: 28%">Nhân viên</th>
                            <th style="width: 28%">Khách hàng</th>
                            <th style="width: 11%">Tổng tiền</th>
                            <th style="width: 28%">Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $x=0 @endphp

                            @foreach ($orders as $order)
                            <tr onclick="window.location='{{ route('order.detail', ['id' => $order->id]) }}';">
                                <th>{{ $x+=1 }}</th>
                                <th>{{ $order->users->name }}</th>
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
<script>
    // Config DataTables 

  $(document).ready(function() {
    $('#dataTable').DataTable({
      "lengthMenu": [5, 15, 25,50,150], // Specify the available page lengths
      "pageLength": 5, // Set the initial number of rows per page
      "searching": true,
      "searchDelay": 500,
      "columns": [
          null, // Cột 1 (Mã)
          { "searchable": true }, // Cột 2 (Nhân viên)
          { "searchable": true }, // Cột 2 (Khách hàng)
          { "searchable": true }, // Cột 3 (Tổng tiền)
          null, // Cột 4 (Thời gian)
      ]
    });
  });

</script>
@endsection

