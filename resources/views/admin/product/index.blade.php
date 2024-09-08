@extends('layouts.admin')

@section('title')
  <title>Trang Sản Phẩm</title>
@endsection
  
  
  
@section('content')

  {{-- @if (isset($products))
    <script src="https://cdn.tailwindcss.com"></script>
  @endif --}}

  {{-- style CSS --}}
  <style> 
    .card-header::after {
      display: none;
    }
  </style>

  @section('css')
    <link rel="stylesheet" href="{{ asset('assets\admin\product\index\css\list.css') }}">
    @endsection
    
  @section('script')
    <script src="{{ asset('vendors\sweetAlert2\sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets\admin\product\index\js\confirm.js') }}"></script>
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
              null, // Cột 2 (Nhân viên)
              { "searchable": true }, // Cột 3 (Tổng tiền)
              { "searchable": true }, // Cột 4 (Thời gian)
              { "searchable": true }, // Cột 5 (Thời gian)
              { "searchable": true }, // Cột 6 (Thời gian)
              { "searchable": true }, // Cột 7 (Thời gian)
              null // Cột 8 (Thời gian)
          ]
        });
      });
    
    </script>
  @endsection

  @section('title_header-page')
    Trang Sản Phẩm
  @endsection

  @section('title_key_header-page')
    view
  @endsection
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn nhập hàng</h6>
              <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Mẫu mã</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $x=0; @endphp

                      @foreach ($products as $product)
                        <tr onclick="location.href='{{ route('product.detail', ['id' => $product->id ]) }}'" >
                          <td> {{ $x+=1}}</td>
                          <td> <img class = "image_feature-product" src="{{ $product->feature_image_path }}" alt=""></td>
                          <td>{{ $product->name }}</td>
                          <td>{{ optional($product->categories)->name }}</td> {{-- cách hiển thị ra khi dùng Eloquent Relationship, thêm optional() vì để khi một sản phẩm nào đó chứa 1 id không tồn tại trong bảng categories thì sẽ in ra null, bỏ optional đi cx đc tại k cần thiết lắm  --}}
                          <td>{{ $product->price }} vnd</td>
                          <td>
                            @php
                              $quantity = 0; // Reset quantity for each product
                              foreach ($product->productAttribute as $proAttr) {
                                  $quantity += $proAttr->quantity;
                              }
                            @endphp
                            {{ $quantity }}
                          </td>
                          <td>{{ $product->productAttribute->count() }}</td>
                          <td>
                            <a href="{{ route('product.edit', ['id' => $product->id ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                            <a data-url= "{{ route('product.delete', ['id' => $product->id ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
@endsection
