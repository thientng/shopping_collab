@extends('layouts.admin')

@section('title')
  <title>Trang User</title>
@endsection
  
  
  
@section('content')

  @if (isset($users))
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
  @endsection

  @section('title_header-page')
    Trang User
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

          <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between">
              <h5 class="m-0">Featured</h5>
              <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm User</a>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th>STT</th>
                          <th>email</th>
                          <th>Tên</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($users as $user)
                          <tr>
                            <td> {{($users->currentPage() - 1) * $users->perPage() + $loop->iteration}}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                              <a href="{{ route('users.edit', ['id' => $user->id ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                              <a data-url= "{{ route('users.delete', ['id' => $user->id ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                            </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  {{ $users->links() }}   
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
