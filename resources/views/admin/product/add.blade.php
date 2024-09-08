@extends('layouts.admin')

@section('title')
  <title>Thêm sản phẩm</title>
@endsection

@section('css')
  <link href="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}" rel="stylesheet" />
  {{-- style this page (single) --}}
  <link rel="stylesheet" href=" {{ asset('assets/admin/product/add/css/add.css') }}"> 

@endsection



@section('content')

  @section('title_header-page')
  Thêm Sản Phẩm
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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"> {{-- thêm enctype="multipart/form-data" để có thể up được nhiều ảnh một lúc --}}
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
                          <label for="formControlInput1">Tên sản phẩm</label>
                          <input value="{{ old('name') }}" name = "name" type="text" class="form-control @error('name') is-invalid @enderror" id="formControlInput1" placeholder="Nhập tên sản phẩm ...">
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
                          <label >Nhập mô tả sản phẩm</label>
                          {{-- rich text editer plugin (Tiny khóa vì dùng cái khác) <textarea id="editor" name = "content"></textarea> --}}
                          <textarea rows="8" name="contents" class="form-control tiny-editor @error('contents') is-invalid @enderror">{{ old('contents') }}</textarea>
                        </div>
                        @error('contents')
                          <div class="alert-input_field">
                            {{ $message }} * 
                            <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                          </div>
                        @enderror
                      </div>
                      <div class="post-tags pt-3">
                        <div class="form-group">
                          <label >Thêm tags cho sản phẩm</label>
                          
                          <select name ="tags[]" class="form-control tags_select_select2 " multiple="multiple" >
                            {{-- <option selected="selected">orange</option>
                            <option>white</option>
                            <option selected="selected">purple</option> --}}
                          </select>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 ">
                    <div class="postbox-side">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="price-box">
                            <div class="title-box">
                              <label  for="formControlInputPrice">Giá cả</label>
                            
                            </div>
                            <div class="price-box_content">
                              <div class="form-group">
                                <input value="{{ old('price') }}" name = "price" type="text" class="form-control @error('price') is-invalid @enderror" id="formControlInputPrice" placeholder="Nhập giá...">
                              </div>
                              @error('price')
                                <div class="alert-input_field">
                                  {{ $message }} * 
                                  <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="opacity: 0">
                          <div class="price-box">
                            <div class="title-box">
                              <label  for="formControlInputPrice">Giá giảm</label>
                            
                            </div>
                            <div class="price-box_content">
                              <div class="form-group">
                                <input value="{{ old('price') }}" name = "price_sale" type="text" class="form-control @error('price') is-invalid @enderror" id="formControlInputPrice" placeholder="Nhập giá giảm...">
                              </div>
                              @error('price')
                                <div class="alert-input_field">
                                  {{ $message }} * 
                                  <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                                </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="postbox-side">
                      <div class="avatar-box">
                        <div class="title-box">
                          <label for="formControlInputAtava">Ảnh đại diện</label>
                        </div>
                        <div class="avatar-box_content">
                          {{-- <div class="form-group input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" readonly="true" class="form-control" type="text" name="filepath">
                          </div> --}}
                          <div class="form-group">
                            <input type="file" name = "feature_image_path" class="form-control-file">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="postbox-side">
                      <div class="detail-image">
                        <div class="title-box">
                          <label for="formControlInputAtava">Ảnh chi tiết</label>
                        </div>
                        <div class="detail-image_content">
                          <div class="form-group">
                            <input type="file" multiple  name = "image_path[]" class="form-control-file"> {{-- đặt tên cú pháp là name[] và thêm multiple để upload nhiều file 1 lúc --}}
                          </div>
                        </div>
                      </div>
                    </div>
  
                    <div class="postbox-side">
                      <div class="category-box">
                        <div class="title-box">
                          <label for="formControlInputPrice">Danh mục sản phẩm</label>
                        </div>
                        <div class="category-box_content">
                          <div class="form-group ">
                            <select name = "category" class="@error('category') is-invalid @enderror js-example-placeholder-single js-states form-control" >
                              <option value="" selected > Danh mục cha </option>
                              {!! $htmlOptions !!}
                            </select>
                          </div>
                          @error('category')
                            <div class="alert-input_field">
                              {{ $message }} * 
                              <span class="closebtn-input_field" onclick="this.parentElement.style.display='none';">&times;</span> 
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    
                    <div class="postbox-side py-4" >
                      <div class="buttonSubmit-box d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Thêm sản phẩm">
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
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
  var route_prefix = "/laravel-filemanager";
  $('#lfm').filemanager('image', {prefix: route_prefix});
  
</script>
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