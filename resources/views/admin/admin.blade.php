@extends('layouts.admin')

@section('title')
  <title>Trang quản trị</title>
@endsection



@section('content')
  {{-- style CSS --}}
  <style> 
    .card-header::after {
      display: none;
    }
  </style>

  @section('title_header-page')
    Trang quản trị
  @endsection
  @section('title_key_header-page')
    
  @endsection

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-header d-flex justify-content-between">
              {{-- <h5 class="m-0">Trang Admin</h5> --}}
              <a href="{{ route('category.index') }}"  class="disabled btn btn-primary">Trang Amin</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John</td>
                      <td>Doe</td>
                      <td>john@example.com</td>
                    </tr>
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
                </table>
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

