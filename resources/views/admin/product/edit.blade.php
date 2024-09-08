@extends('layouts.admin')

@section('title')
  <title>Sửa sản phẩm</title>
@endsection

@section('css')
  <link href="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}" rel="stylesheet" />
  {{-- style this page (single) and common css --}}
  <link rel="stylesheet" href=" {{ asset('assets\admin\product\add\css\add.css') }}"> 
  <link rel="stylesheet" href=" {{ asset('assets\admin\product\edit\css\edit.css') }}"> 
  
@endsection


@section('content')

  @section('title_header-page')
  Sửa sản phẩm
  @endsection

  @section('title_key_header-page')
  add
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <form action="{{ route('product.update',['id' => $product->id ]) }}" method="post" enctype="multipart/form-data"> {{-- thêm enctype="multipart/form-data" để có thể up được nhiều ảnh một lúc --}}
              @csrf
              <div class="card-header d-flex justify-content-between">
                <h5 class="m-0">Featured</h5>
                <input type="submit" class="btn btn-primary" value="Cập nhật">
              </div>

              <div class="card-body">
                <div class="row post-body">
                  <div class="col-md-8 ">
                    <div class="post-content">
                      <div class="post-title">
                        <div class="form-group">
                          <label for="formControlInput1">Tên sản phẩm</label>
                          <input name = "name" type="text" class="form-control" id="formControlInput1" placeholder="Nhập tên sản phẩm ..." value=" {{ $product->name }}">
                        </div>
                      </div>
                      <div class="post-description pt-3">
                        <div class="form-group">
                          <label >Nhập mô tả sản phẩm</label>
                          {{-- rich text editer plugin (Tiny khóa vì dùng cái khác) <textarea id="editor" name = "content"></textarea> --}}
                          <textarea rows="8" name="contents" class="form-control tiny-editor"> @if (!empty($product->content)) {{ $product->content }} @endif</textarea>
                        </div>
                      </div>
                      <div class="post-tags pt-3">
                        <div class="form-group">
                          <label >Thêm tags cho sản phẩm</label>
                          
                          <select name ="tags[]" class="form-control tags_select_select2 " multiple="multiple" >
                            @foreach ($product->tags()->get() as $tag)
                                <option selected="selected" value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4 ">
                    <div class="postbox-side">
                      <div class="price-box">
                        <div class="title-box">
                          <label for="formControlInputPrice">Giá cả</label>
                        
                        </div>
                        <div class="price-box_content">
                          <div class="form-group">
                            <input name = "price" value="{{ $product->price }}" type="text" class="form-control" id="formControlInputPrice" placeholder="Nhập giá...">
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
                            <div class="avatar-box_image row justify-content-center" >
                                <div class="col-md-6">
                                    <img class="avatar-product_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>

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
                            <div class="detail-image_list row scroll-inner ">
                                @if (!empty($product->images))
                                    @foreach ($product->images as $itemImage)
                                        <div class="col-md-4 p-1">
                                            <img class ="detail-product_image" src="{{ $itemImage->image_path }}" alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
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
                          <div class="form-group">
                            <select required name = "category_id" class="js-example-placeholder-single js-states form-control" >
                              <option value="" selected > Danh mục cha </option>
                              {!! $htmlOptions !!}
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
  
                  </div>
                  
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection

@section('script')
{{-- select plugin --}}
  <script src="{{ asset('vendors\select2\cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js') }}"></script>
  
{{-- rich text editer plugin TinyMCE5 --}}
<script src="https://cdn.tiny.cloud/1/16pi091837sto9b3dgrbnj9lyz964x26uvaefzqlsa5a14ff/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


{{-- Js this page --}}
<script src=" {{ asset('assets/admin/product/add/js/add.js') }} "></script>

@endsection