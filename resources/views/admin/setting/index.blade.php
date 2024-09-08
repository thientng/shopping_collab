@extends('layouts.admin')

@section('title')
  <title>Trang Slider</title>
@endsection
  
  
  
@section('content')

  @if (isset($settings))
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
    Trang Slider
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
              <div class="dropdown">
                <button style="color: rgb(94, 231, 126)" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Thêm setting
                </button>
                <div class="dropdown-menu">
                  <a href="{{ route('settings.create') . '?type=Text' }}" class="dropdown-item" href="#">Dạng Text</a>
                  <a href="{{ route('settings.create') . '?type=Textarea' }}" class="dropdown-item" href="#">Dạng Textarea</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th>STT</th>
                          <th>Ảnh</th>
                          <th>Tên</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($settings as $setting)
                          <tr>
                            <td> {{($settings->currentPage() - 1) * $settings->perPage() + $loop->iteration}}</td>
                            <td>{{ $setting->config_key }}</td>
                            <td>{!! $setting->config_value !!}</td>
                            <td>
                              <a href="{{ route('settings.edit', ['id' => $setting->id ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                              <a data-url= "{{ route('settings.delete', ['id' => $setting->id ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                            </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  {{ $settings->links() }}   
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
