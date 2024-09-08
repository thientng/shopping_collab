@extends('layouts.admin')

@section('title')
  <title>Thêm user</title>
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
  Thêm user
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
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"> {{-- thêm enctype="multipart/form-data" để có thể up được nhiều ảnh một lúc --}}
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
                                    <label for="">Tiêu user</label>
                                    <input value="{{ old('name') }}" name = "name" type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nhập tên user ...">
                                </div>
                                @error('name')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>
                            <div class="post-email">
                                <div class="form-group">
                                    <label for="">Email User</label>
                                    <input value="{{ old('email') }}" name = "email" type="email" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Nhập tên user ...">
                                </div>
                                @error('email')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>
                            <div class="post-password">
                                <div class="form-group">
                                    <label for="">Mật khẩu</label>
                                    <input value="{{ old('password') }}" name = "password" type="password" class="form-control @error('password') is-invalid @enderror" id="" placeholder="Nhập tên user ...">
                                </div>
                                @error('password')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>
                            <div class="post-password_repet">
                                <div class="form-group">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input value="{{ old('confirm_password') }}" name = "confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="" placeholder="Nhập tên user ...">
                                </div>
                                @error('confirm_password')
                                    <div class="alert-input_field">
                                    {{ $message }} * 
                                    <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                    </div>
                                    {{-- <div class="alert alert-danger">{{ $message }}*</div> --}}
                                @enderror
                            </div>

                            <div class="post-role">
                                <div class="form-group">
                                    <label for="">Vai trò</label>
                                    <select name ='roles[]' multiple class="form-control select2_option" id="">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('roles')
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
                                <input type="submit" class="btn btn-primary" value="Thêm user">
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