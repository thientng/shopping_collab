@extends('layouts.client_view')


@section('content')

    <!-- Hero Section Begin -->
@include('client_view.components.slider')
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/client_view/img/banner-1.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/client_view/img/banner-2.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/client_view/img/banner-3.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{ asset('assets/client_view/img/products/women-large.jpg') }}">
                        <h2>Women’s</h2>
                        {{-- <a href="#">Discover More</a> --}}
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control" style="opacity: 0">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach ($products as $product)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ $product->feature_image_path }}" alt="">
                                    <div class="sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        {{-- <li class="w-icon active"><a class="add_to_cart" data-toggle="modal" data-target="#exampleModalScrollable" data-cart-url="{{ route('product.add-to-cart',['id' => $product->id]) }}"  data-product-id="{{ $product->id }}" ><i class="icon_bag_alt"></i></a></li> --}}
                                        <li class="quick-view"><a href="{{ route('home.product-detail',['id' => $product->id]) }}">Xem Sản Phẩm</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product->categories->name }}</div>
                                    <a href="#">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{ number_format($product->price) }} vnd
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="{{ asset('assets/client_view/img/time-bg.jpg') }}">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control" style="opacity: 0">
                        <ul>
                            <li class="active">Clothings</li>
                            <li>HandBag</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach ($productsMan as $product)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ $product->feature_image_path }}" alt="">
                                    <div class="sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        {{-- <li class="w-icon active"><a class="add_to_cart btn" data-toggle="modal" data-target="#exampleModalScrollable"  data-product-id="{{ $product->id }}" data-cart-url="{{ route('product.add-to-cart',['id' => $product->id]) }}" ><i class="icon_bag_alt"></i></a></li> --}}
                                        <li class="quick-view"><a href="{{ route('home.product-detail',['id' => $product->id]) }}">Xem Sản Phẩm</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product->categories->name }}</div>
                                    <a href="#">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{ number_format($product->price) }}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="{{ asset('assets/client_view/img/products/man-large.jpg') }}">
                        <h2>Men’s</h2>
                        {{-- <a href="#">Discover More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-1.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-2.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-3.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-4.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-5.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('assets/client_view/img/insta-6.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset('assets/client_view/img/latest-1.jpg') }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset('assets/client_view/img/latest-2.jpg') }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset('assets/client_view/img/latest-3.jpg') }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src=" {{ asset('assets/client_view/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src=" {{ asset('assets/client_view/img/icon-2.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src=" {{ asset('assets/client_view/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('assets/client_view/img/logo-carousel/logo-1.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('assets/client_view/img/logo-carousel/logo-2.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('assets/client_view/img/logo-carousel/logo-3.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('assets/client_view/img/logo-carousel/logo-4.png') }}" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('assets/client_view/img/logo-carousel/logo-5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Modal Product Popup Begin -->
    @include('client_view.components.product_popup.product_popup')
    <!-- Modal Product Popup End -->

@endsection

@section('script')


<script>
    
    function quantityProductByColor() {
        var colorId = $(this).data('color-id');
        var urlQuantityCheck = "{{ route('product.quantity-check',['id'=>'colorId']) }}" ;
        urlQuantityCheck = urlQuantityCheck.replace('colorId', colorId);
        
        var sizes = $('.pd-size-choose .sc-item > input[type="radio"]');
        console.log(urlQuantityCheck);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // Gửi giá trị của input lên server
        $.ajax({
            url: urlQuantityCheck,
            type: 'POST',
            success: function (data) {
                if(data.code == 200){
                    $.each(sizes, function(index, item) {
                        var sizeId = $(item).data('size-id');
                        var matchingSize = data.sizeQuantity.find(function(value) {
                            return sizeId == value.size_id;
                        });

                        if (matchingSize) {
                            // console.log(matchingSize.quantity);
                            $(item).attr('data-size-quantity', matchingSize.quantity);
                        } else {
                            $(item).attr('data-size-quantity', null);
                        }
                    });

                }

                sizes.each(function(index, element) {
                    var currentElement = $(element);
                    
                    var vCheck = parseInt(currentElement.attr('data-size-quantity'), 10);
                    console.log(vCheck);
                    if (currentElement.attr('data-size-quantity') == undefined || vCheck === 0) {
                        currentElement.parents('.sc-item').find('label').addClass('disabled');
                        currentElement.parents('.sc-item').find('label').attr('aria-disabled', true);
                        
                        if(currentElement.parents('.sc-item').find('label').hasClass('active')){
                            currentElement.parents('.sc-item').find('label').removeClass('active');
                        }
                    } else {
                        currentElement.parents('.sc-item').find('label').attr('aria-disabled', false);
                        currentElement.parents('.sc-item').find('label').removeClass('disabled');
                    }
                });
            },
            error: function(data) {

            }
        });

    }
    
    $(function() {
        /*-------------------
        Quantity type input
        --------------------- */
        $(document).on('click', '.pd-color-choose .cc-item > input[type="radio"]', quantityProductByColor);
    });
</script>
@endsection
