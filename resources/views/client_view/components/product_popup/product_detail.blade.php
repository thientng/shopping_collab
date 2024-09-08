{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href=" {{ asset('assets/client_view/css/style.css') }}" type="text/css">
</head>
<body style="margin: 0;">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src=" {{ asset('assets/client_view/js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery-ui.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.countdown.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.nice-select.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.zoom.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.dd.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/jquery.slicknav.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('assets/client_view/js/main.js') }}"></script>
</body>
</html> --}}


    @if (isset($productCart))
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ $productCart->feature_image_path }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{ $productCart->feature_image_path }}"><img
                                            src="{{ $productCart->feature_image_path }}" alt=""></div>
                                    {{-- @if ($productCart->images->image_path !== null) --}}
                                        @foreach ($productCart->images as $img)
                                            <div class="pt" data-imgbigurl="{{ $img->image_path }}"><img
                                                src="{{ $img->image_path }}" alt="" style="height: 150px;object-fit: cover">
                                            </div>
                                        @endforeach
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>oranges</span>
                                    <h3>{{ $productCart->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p> hehe<p>
                                    <h4>₫ {{ number_format($productCart->price) }} <span>629.99</span></h4>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        @foreach ($colorsCart as $color)
                                            <div class="cc-item">
                                                <input type="radio" id="cc-{{ trim(strtolower(str_replace(' ', '', $color->value))) }}" data-color-id="{{ $color->id }}">
                                                <label for="cc-{{ trim(strtolower(str_replace(' ', '', $color->value))) }}" style="background:{{ $color->value }};"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach ($sizesCart as $size)
                                        <div class="sc-item">
                                            <input type="radio" value="{{ $size->id }}" id="{{ trim(strtolower(str_replace(' ', '', $size->value))) }}-size" data-size-id="{{ $size->id }}" data-size-quantity="">
                                            <label for="{{ trim(strtolower(str_replace(' ', '', $size->value))) }}-size" role="button" >{{ trim($size->value) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{ $productCart->categories->name }}</li>
                                    <li><span>TAGS</span>: 
                                    @if (!empty($tagsCart))
                                        {{ implode(', ', $tagsCart->pluck('name')->toArray()) }} 
                                        {{-- pluck() : chỉ lấy dữ liệu với trường name, ->toArray() vì implode() chỉ hỗ trợ mảng, implode() :  --}}
                                    @endif
                                    </li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : 00012</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav d-flex justify-content-center" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            {{-- <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                                <h5>Features</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="{{ asset('assets/client_view/img/product-single/tab-desc') }}.jpg" alt="">
                                            </div> --}}
                                            {!! $productCart->content !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('assets/client_view/img/product-single/avatar-1') }}.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{ asset('assets/client_view/img/product-single/avatar-2') }}.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    @endif



