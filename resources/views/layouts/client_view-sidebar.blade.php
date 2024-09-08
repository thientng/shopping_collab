<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets\client_view\img\item-image') }}" type="image/x-icon">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/style.css') }}" type="text/css">

    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    @include('client_view.components.header')

    @yield('content')
    
    @include('client_view.components.footer')

    <!-- Js Plugins -->
    <script src=" {{ asset('assets/client_view/js/jquery-3.3.1.min.js') }}"></script>
    {{-- <script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }} "></script> --}}
    
    <script src=" {{ asset('assets/client_view/js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery-ui.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.countdown.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.nice-select.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.zoom.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.dd.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.slicknav.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/main.js') }}"></script>
    @yield('script')
</body>

</html>