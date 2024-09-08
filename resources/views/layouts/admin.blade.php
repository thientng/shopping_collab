
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')
  {{-- logo mini website --}}
  <link rel="shortcut icon" href="{{ asset('logo-mini.svg') }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href=" {{ URL('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }} ">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=" {{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }} ">
  {{-- Font Awesome Lastest version --}}
  <link rel="stylesheet" href="{{ URL('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}">
  {{-- Bootstrap 4 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/adminlte.min.css') }} ">
  {{-- DataTables --}}
  <link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('admin.partials.header')
  @include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title_header-page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('title_header-page')</a></li>
              <li class="breadcrumb-item active">@yield('title_key_header-page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  @include('admin.partials.footer')

</div>
<!-- ./wrapper -->

{{-- test có thể xóa --}}
<script>
  // var navItems = document.querySelectorAll('');
  
  // for (var i = 0; i < navItems.length; i++) {
  //   navItems[i].onclick = function (e) {
  //     e.target.classList.add('active');
  //   }
  // }
  const navItems = document.querySelectorAll('.sidebar .nav-sidebar>.nav-item');

  for (const navItem of navItems) {
    navItem.addEventListener('click', () => {
      navItem.classList.add('active');
    });
  }
</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- AdminLTE App -->
<script src=" {{ asset('adminlte/dist/js/adminlte.min.js') }} "></script>

{{-- Datatables --}}
<script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>



@yield('script')
</body>
</html>
