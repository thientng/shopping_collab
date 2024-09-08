@extends('layouts.admin')

@section('title')
  <title>Trang Menus</title>
@endsection
  
  
  
  @section('content')

  @if (isset($menus))
    <script src="https://cdn.tailwindcss.com"></script>
  @endif

  {{-- style CSS --}}
  <style> 
    .card-header::after {
      display: none;
    }
  </style>

  @section('title_header-page')
    Trang Menus
  @endsection

  @section('title_key_header-page')
    view
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
              <a href="{{ route('menus.create') }}" class="btn btn-primary">Thêm menu</a>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th>ID</th>
                          <th>Tên menu</th>
                          <th>Slug</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($menus as $value)
                          <tr>
                            <td> {{($menus->currentPage() - 1) * $menus->perPage() + $loop->iteration}}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>
                              <a href="{{ route('menus.edit', ['id' => $value->id]) }}" class="btn btn-success btn-rounded">Sửa</a>
                              <a href="{{ route('menus.delete', ['id' => $value['id']]) }}" class="btn btn-warning btn-rounded">Xóa</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  {{ $menus->links() }}   {{-- dùng để phân trang phần đã set từ trong controller paginate(5). Cú pháp : tên biến lưu dữ liệu->link() --}}
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
