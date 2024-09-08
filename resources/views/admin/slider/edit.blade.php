@extends('layouts.admin')

@section('title')
  <title>Cập nhật</title>
@endsection

@section('css')
  <link href="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}" rel="stylesheet" />
  {{-- style this page (single) --}}
  <link rel="stylesheet" href=" {{ asset('assets/admin/product/add/css/add.css') }}"> 
  <link rel="stylesheet" href=" {{ asset('assets\admin\product\edit\css\edit.css') }}"> 

@endsection



@section('content')

  @section('title_header-page')
  Cập nhật
  @endsection
  @section('title_key_header-page')
  edit
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <form action="{{ route('slider.update',['id' => $slider->id]) }}" method="post" enctype="multipart/form-data"> {{-- Cập nhật="multipart/form-data" để có thể up được nhiều ảnh một lúc --}}
              @csrf
              <div class="card-header d-flex justify-content-between">
                <h5 class="m-0">Featured</h5>
              </div>

              <div class="card-body">
                <div class="row post-body">
                    <div class="col-md-8 ">
                        <div class="post-content">
                            <div class="post-title">
                                <div class="form-group">
                                    <label for="formControlInput1">Tiêu đề slider</label>
                                    <input value="{{ $slider->title }}" name = "name" type="text" class="form-control @error('name') is-invalid @enderror" id="formControlInput1" placeholder="Nhập tên slider ...">
                                </div>
                                @error('name')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>
                            <div class="post-description pt-3">
                                <div class="form-group">
                                    <label >Nhập mô tả slider</label>
                                    {{-- rich text editer plugin (Tiny khóa vì dùng cái khác) <textarea id="editor" name = "content"></textarea> --}}
                                    <textarea rows="8" name="contents" class="form-control tiny-editor @error('contents') is-invalid @enderror">{!! $slider->description !!}</textarea>
                                </div>
                                @error('contents')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                @enderror
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-4 ">
                        <div class="postbox-side">
                            <div class="avatar-box">
                                <div class="title-box">
                                    <label for="formControlInputAtava">Ảnh nền</label>
                                </div>
                                <div class="avatar-box_content">
                                  <div class="avatar-box_image row justify-content-center" >
                                    <div class="col-md-6">
                                        <img class="avatar-product_image" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <input type="file" name = "image_path" class="form-control-file">
                                  </div>
                                </div>
                            </div>
                            @error('image_path')
                                <div class="alert-input_field">
                                {{ $message }} * 
                                <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                </div>
                            @enderror
                        </div>
                        <div class="postbox-side py-4" >
                            <div class="buttonSubmit-box d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary" value="Cập nhật">
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