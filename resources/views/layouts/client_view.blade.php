<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="" type="image/x-icon">
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

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    {{-- <script src=" {{ asset('assets/client_view/js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

    <script>
        // function addToCart(event) {
        //     event.preventDefault();
        //     var urlCart = $(this).data('url');

        //     $.ajax({
        //         type: 'GET',
        //         url: urlCart,
        //         dataType: 'text', // để json là lỗi, còn tại sao lỗi thì tự tìm hiểu
        //         success: function(data) {
        //             var jsonData = JSON.parse(data); // đổi dữ liệu thành json để đảm bảo, vì json nhẹ, được chuẩn hóa, dễ chuyển đổi
        //             // console.log(jsonData.cart);
        //             console.log(jsonData);
        //             if(jsonData.code == 200) {

        //             }
        //         },
        //         error: function(data) {
        //             console.error('Failed to make the request');
        //         },
        //     });
        // }

        // $(function() {
        //     $(document).on('click', '.add_to_cart', addToCart);
        // });
        
        // add to cart for product modal(small product)
        // function addToCart(event) {
        //     event.preventDefault();
        //     var productId = $(this).data('product-id');
        //     var urlProductCart = "{{ route('product.detail-cart',['id' => 'product-id']) }}";
        //     urlProductCart = urlProductCart.replace('product-id', productId);

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type: 'POST',
        //         url: urlProductCart,
        //         success: function(data) {
        //             if(data.code == 200) {
        //                 console.log(typeof data.productModal);
                        
        //                 $('.modal-body').html(data.productModal);
        //                 location.reload();
        //             }
        //         },
        //         error: function(data) {

        //         },
        //     });
        // }

        // $(function() {
        //     $(document).on('click', '.add_to_cart', addToCart);
        // });

    </script>

    @yield('script')
</body>

</html>