@extends('layouts.client_view')


@section('content')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
    .cart-table table tr td.qua-col .pro-qty input::-webkit-inner-spin-button,
    .cart-table table tr td.qua-col .pro-qty input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* input[type="number"] {
        -moz-appearance: textfield;
    } */
    </style>
@endsection

@include('client_view.components.breacrumb')

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
    @include('client_view\cart\components\cart_box')
    </section>
    <!-- Shopping Cart Section End -->

@include('client_view.components.partner-logo')

@endsection

@section('script')
    <script>
            
        
        /*-------------------
        Quantity change button
        --------------------- */

        function initQuantityChange() {
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
	        proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function () {
                var button = $(this);
                var input = button.closest('.pro-qty').find('.quantity-input');
                var oldValue = parseFloat(input.val());
                var newVal = oldValue;

                if (button.hasClass('inc')) {
                    if(newVal <  $(input).data('pro-attr-quantity')){
                        newVal = oldValue + 1;
                    } else {
                        alert('Chỉ được đặt tối đa '+ $(input).data('pro-attr-quantity') +' sản phẩm');
                    }
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = oldValue - 1;
                    } else {
                        newVal = 0;
                    }
                }

                input.val(newVal);
                // Gọi hàm quantityUpdate để xử lý logic cập nhật số lượng trên máy chủ
                quantityUpdate(newVal, input);
            });
        }
        /*------------------------
        Quantity update on server
        ----------------------- */
        function quantityUpdate(newVal = null,input = null) {
            var quantity;
            var id;

            // Lấy giá trị của input
            if(newVal !== null && input !== null){
                quantity = newVal;
                id = input.data('id');
            } else{
                if(($(this).val() > $(this).data('pro-attr-quantity'))){
                    quantity = $(this).data('pro-attr-quantity');
                    $(this).val(quantity);
                    alert('Chỉ được đặt tối đa '+ quantity +' sản phẩm');
                }else {
                    quantity = $(this).val();
                }
                id = $(this).data('id');
            }
            
            if(quantity <= $(this).data('pro-attr-quantity') || quantity <= input.data('pro-attr-quantity')){
                var urlUpdateCart = $('#cart').data('url');
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Gửi giá trị của input lên server
                $.ajax({
                    url: urlUpdateCart,
                    type: 'POST',
                    data: {
                        id: id,
                        quantity: quantity
                    },
                    success: function (data) {
                        if(data.code == 200){
                            $('.shopping-cart').html(data.cartView);
                            initQuantityChange(); // Gắn lại sự kiện thay đổi số lượng
                        } 
                    },
                    error: function(data) {
    
                    }
                });
            } 
        }

        function cartDetele(){
            // Lưu ý rằng data-url-delete-cart trong HTML sẽ được chuyển đổi thành urlDeleteCart (camelCase) trong JavaScript khi bạn sử dụng data().
            var urlDeleteCart = $('#cart').data('urlDeleteCart');
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: urlDeleteCart,
                type: 'POST',
                data: {
                    id: id
                },
                success: function (data) {
                    if(data.code == 200){
                        $('.shopping-cart').html(data.cartView);
                    } 
                },
                error: function(data) {

                }
            });
        }
        
        $(function() {
            // Khởi tạo sự kiện thay đổi số lượng
            initQuantityChange();
            /*-------------------
            Quantity type input
            --------------------- */
            $(document).on('change', '#quantity', quantityUpdate);

            /*-------------------
                Cart delete
            --------------------- */
            $(document).on('click', '.ti-close', cartDetele);
        });

    </script>

@endsection

