@extends('layouts.admin')

@section('title')
  <title>Trang danh mục</title>
  @endsection
  
  
  
  @section('content')

  @if (isset($categories))
    <script src="https://cdn.tailwindcss.com"></script>
  @endif

  {{-- style CSS --}}
  <style> 
    .card-header::after {
      display: none;
    }
  </style>

  @section('title_header-page')
    Trang danh mục
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between">
              <h5 class="m-0">Featured</h5>
              <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm danh mục</a>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th>ID</th>
                          <th>Tên danh mục</th>
                          <th>slug</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $stt = 1;
                        @endphp

                        @foreach ($categories as $value)
                          <tr>
                            <td> {{($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration}}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>
                              @can('category-update')
                                <a href="{{ route('category.edit', ['id' => $value->id]) }}" class="btn btn-success btn-rounded">Sửa</a>                               
                              @endcan
                              
                              @can('category-delete')
                                <a href="{{ route('category.delete', ['id' => $value['id']]) }}" class="btn btn-warning btn-rounded">Xóa</a>
                              @endcan
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  {{ $categories->links() }} {{-- dùng để phân trang phần đã set từ trong controller paginate(5). Cú pháp : tên biến lưu dữ liệu->link() --}}
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
