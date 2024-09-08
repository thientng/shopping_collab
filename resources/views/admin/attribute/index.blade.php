@extends('layouts.admin')

@section('title')
  <title>Trang thuộc tính sản phẩm</title>
@endsection
  
  
  
@section('content')

  @if (isset($attributesSize) || isset($attributesColor))
    <script src="https://cdn.tailwindcss.com"></script>
  @endif

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
    <script src="{{ asset('assets\admin\product\index\js\confirm.js') }}"></script> {{-- viết lệnh ajax xóa settings --}}
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
              null, // Cột 3 (Tổng tiền)
          ]
        });
      });
      // Config DataTables     
      $(document).ready(function() {
        $('#dataTablee').DataTable({
          "lengthMenu": [5, 15, 25,50,150], // Specify the available page lengths
          "pageLength": 5, // Set the initial number of rows per page
          "searching": true,
          "searchDelay": 500,
          "columns": [
              null, // Cột 1 (Mã)
              { "searchable": true }, // Cột 2 (Nhân viên)
              null, // Cột 3 (Tổng tiền)
          ]
        });
      });
    
    </script>
  @endsection

  @section('title_header-page')
    Trang thuộc tính sản phẩm
  @endsection

  @section('title_key_header-page')
    list
  @endsection
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6">
              {{-- <div class="card card-primary card-outline">
                <div class="card-header d-flex justify-content-between">
                  <h5 class="m-0">Color</h5>
                  <a href="{{ route('attributes.create',['nameType' => 'color']) }}" class="btn btn-primary">Thêm Color</a>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th>STT</th>
                              <th>Color</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
    
                            @foreach ($attributesColor as $attribute)
                              <tr>
                                <td> {{($attributesColor->currentPage() - 1) * $attributesColor->perPage() + $loop->iteration}}</td>
                                <td> <span class="d-block" style="border-radius: 50%;height: 25px;width: 25px;background-color: {{ $attribute->value }};"></span></td>
                                <td>
                                  <a href="{{ route('attributes.edit', ['id' => $attribute->id,'nameType' => 'color' ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                                  <a data-url= "{{ route('attributes.delete', ['id' => $attribute->id,'nameType' => 'color' ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                                </td>
                              </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-12">
                      {{ $attributesColor->links() }}   
                    </div>
                  </div>
                </div>
              </div> --}}
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn nhập hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>STT</th>
                              <th>Color</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $x=0; @endphp

                          @foreach ($attributesColor as $attribute)
                            <tr>
                              <td> {{($attributesColor->currentPage() - 1) * $attributesColor->perPage() + $loop->iteration}}</td>
                              <td> <span class="d-block" style="border-radius: 50%;height: 25px;width: 25px;background-color: {{ $attribute->value }};"></span></td>
                              <td>
                                <a href="{{ route('attributes.edit', ['id' => $attribute->id,'nameType' => 'color' ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                                <a data-url= "{{ route('attributes.delete', ['id' => $attribute->id,'nameType' => 'color' ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn nhập hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTablee" width="100%" cellspacing="0">
                        <thead class="thead-light">
                          <tr>
                            <th>STT</th>
                            <th>Size</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
  
                          @foreach ($attributesSize as $attribute)
                            <tr>
                              <td> {{$x+=1}}</td>
                              <td>{{ $attribute->value }}</td>
                              <td>
                                <a href="{{ route('attributes.edit', ['id' => $attribute->id,'nameType' => 'size' ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                                <a data-url= "{{ route('attributes.delete', ['id' => $attribute->id,'nameType' => 'size' ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
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
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection
