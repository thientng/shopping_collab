@extends('layouts.admin')

@section('title')
  <title>Thêm Menu</title>
@endsection

<style>
  .form-control {
    border: 1px solid #ced4da !important;
  }
</style>





@section('content')
  {{-- style CSS --}}
  <style> 
    .card-header::after {
      display: none;
    }
  </style>

  @section('title_header-page')
    Thêm Menu 
  @endsection
  @section('title_key_header-page')
    Add
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between">
              <h5 class="m-0">Thêm Mới</h5>
              <a href="{{ route('menus.index') }}" class="btn ">❌</a>
            </div>
            <div class="card-body">
                <form action="{{ route('menus.store') }}" method="post">
                    @csrf {{-- thêm vào mỗi khi dùng form để bảo mật--}}

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                      <input type="text" name = "menus_name" id="form4Example1" class="form-control" />
                      <label class="form-label" for="form4Example1">Tên Menu</label>
                    </div>
                  
                    <!-- Email input -->
                    <div class="form-group">
                      <select name = "parent_id" class="form-control" id="exampleFormControlSelect1">
                        <option value="0" selected > Menu cha </option>
                        {!! $htmlOption !!}
                      </select>
                    </div>
                  
                    <!-- Message input -->
                    <div class="form-outline mb-4">
                      <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                      <label class="form-label" for="form4Example3">Message</label>
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Thêm Menu</button>
                </form>
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


{{-- CSS --}}
<!-- Font Awesome -->
<link
  href=" {{ URL('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css') }} "
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href=" {{ URL('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap') }} "
  rel="stylesheet"
/>
<!-- MDB -->
<link 
  href=" {{ URL('https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css') }} " 
  rel="stylesheet" 
/>


{{-- JS --}}
<!-- MDB -->
<script type="text/javascript" src=" {{ URL('https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js') }}  "></script>