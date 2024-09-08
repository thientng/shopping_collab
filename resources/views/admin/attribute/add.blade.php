@extends('layouts.admin')

@section('title')
  <title>
    @if ($nameType == 'color')
      Thêm Color
    @else
      Thêm Size
    @endif
  </title>
@endsection

@section('css')
  <link href="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}" rel="stylesheet" />
  {{-- style this page (single) --}}
  <link rel="stylesheet" href=" {{ asset('assets/admin/product/add/css/add.css') }}"> 
    <style>
        .select2-search__field:focus {
            border: 0 !important;
        }
    </style>
@endsection

@section('script')
  <script src="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js') }}"></script>
  <script>
    $('.select2_option').select2({
            placeholder: "Chọn vai trò"
        });
  </script>
@endsection




@section('content')

  @section('title_header-page')
    @if ($nameType == 'color')
      Thêm Color
    @else
      Thêm Size
    @endif
  @endsection
  @section('title_key_header-page')
  add
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <form action="{{ route('attributes.store') }}" method="post" enctype="multipart/form-data"> {{-- thêm enctype="multipart/form-data" để có thể up được nhiều ảnh một lúc --}}
              @csrf
              <div class="card-header d-flex justify-content-between">
                @if ($nameType == 'color')
                  <h5 class="m-0">Color</h5>
                @else
                  <h5 class="m-0">Size</h5>
                @endif
              </div>

              <div class="card-body">
                <div class="row post-body">
                    <div class="col-md-8 ">
                        <div class="post-content">
                            <div class="post-title">
                                <div class="form-group">
                                    <label>Tên thuộc tính</label>
                                    <select class="form-select form-control" name="name" aria-label="Disabled select example">
                                      @if ($nameType == 'color')
                                        <option value="color" selected>Màu sắc</option>
                                      @else
                                        <option value="size" selected>Kích cỡ</option>
                                      @endif
                                    </select>
                                </div>
                                @error('name')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>
                            <div class="post-value">
                              <div class="form-group">
                                @if ($nameType == 'color')
                                  <label for="exampleColorInput" class="form-label">Color picker</label>
                                  <input type="color" name="value" class="form-control form-control-color" id="exampleColorInput" value="{{ old('value') }}" title="Choose your color">
                                @else
                                  <label for="exampleColorInput" class="form-label">Nhập kích cỡ</label>
                                  <input type="text" name="value" class="form-control form-control-color" id="exampleColorInput" value="{{ old('value') }}" title="Choose your size">
                                @endif
                              </div>
                              @error('value')
                                <div class="alert-input_field">
                                {{ $message }} * 
                                <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                </div>
                                {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                              @enderror
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-4 ">
                        <div class="postbox-side py-4" >
                            <div class="buttonSubmit-box d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary" value="Thêm thuộc tính">
                            </div>
                        </div>
                    </div>
                  
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection

@section('script')

{{-- sweetAlert2 (popup) --}}
  <script src="{{ asset('vendors\sweetAlert2\sweetalert2@11.js') }}"></script>

{{-- chức năng popup thôg báo lỗi validate của Input field --}}
  {{-- @if ($errors->any())
    <div class="hehe" style="display: none">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>

    <script>
      let printError = document.querySelectorAll('.hehe li');
      var textError = "";
      printError.forEach((value, index) => {
        textError += `[${value.textContent}]`;
      });

      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: textError,
        footer: '<a href="#">Vui lòng điền lại thông tin</a>'
      });
    </script>
  @endif --}}


{{-- select plugin --}}
  <script src="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js') }}"></script>
  
{{-- rich text editer plugin TinyMCE5 --}}
<script src="https://cdn.tiny.cloud/1/16pi091837sto9b3dgrbnj9lyz964x26uvaefzqlsa5a14ff/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


{{-- Js this page --}}
<script src=" {{ asset('assets/admin/product/add/js/add.js') }} "></script>

@endsection