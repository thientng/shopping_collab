@extends('layouts.admin')

@section('title')
  <title>Trang Slider</title>
@endsection
  
  
  
@section('content')

  @if (isset($sliders))
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
    <script src="{{ asset('assets\admin\product\index\js\confirm.js') }}"></script>
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
              <a href="{{ route('slider.create') }}" class="btn btn-primary">Thêm slider</a>
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
                          <th>Mô tả</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($sliders as $slider)
                          <tr>
                            <td> {{($sliders->currentPage() - 1) * $sliders->perPage() + $loop->iteration}}</td>
                            <td> <img class = "image_feature-product" src="{{ $slider->image_path }}" alt=""></td>
                            <td>{{ $slider->title }}</td>
                            <td>{!! $slider->description !!}</td>
                            <td>
                              <a href="{{ route('slider.edit', ['id' => $slider->id ]) }}" class="btn btn-success btn-rounded">Sửa</a>
                              <a data-url= "{{ route('slider.delete', ['id' => $slider->id ]) }}" class="btn btn-warning btn-rounded action_delete">Xóa</a>
                            </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  {{ $sliders->links() }}   
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
