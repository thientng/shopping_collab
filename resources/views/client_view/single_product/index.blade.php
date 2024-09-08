@extends('layouts.client_view')

@section('content')
    @include('client_view.components.breacrumb')   
    
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ $product->feature_image_path }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{ $product->feature_image_path }}"><img
                                            src="{{ $product->feature_image_path }}" alt=""></div>
                                    {{-- @if ($product->images->image_path !== null) --}}
                                        @foreach ($product->images()->get() as $img)
                                            <div class="pt" data-imgbigurl="{{ $img->image_path }}"><img
                                                src="{{ $img->image_path }}" alt="" style="height: 150px;object-fit: cover">
                                            </div>
                                        @endforeach
                                        @foreach ($product->productAttribute as $img)
                                            <div class="pt" data-imgbigurl="{{ $img->image }}"><img
                                                src="{{ $img->image }}" alt="" style="height: 150px;object-fit: cover">
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
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                {{-- <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div> --}}
                                <div class="pd-desc">
                                    <h4>₫ {{ number_format($product->price) }}</h4>
                                </div>
                                
                                
                                @php
                                $quantity = 0; // Reset quantity for each product
                                foreach ($product->productAttribute as $proAttr) {
                                    $quantity += $proAttr->quantity;
                                }
                                @endphp
                                @if ($quantity == 0)
                                <div class="quantity">
                                    <a href="" class="primary-btn pd-cart">hàng vui lòng liên hệ: 0896444902</a>
                                </div>
                                @else
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        @foreach ($colors as $color)
                                            <div class="cc-item">
                                                <input type="radio" name="color" value="{{ $color->value }}" id="cc-{{ trim(strtolower(str_replace(' ', '', $color->value))) }}" data-color-id="{{ $color->id }}">
                                                <label for="cc-{{ trim(strtolower(str_replace(' ', '', $color->value))) }}" style="background:{{ $color->value }};"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    @foreach ($sizes as $size)
                                        <div class="sc-item">
                                            <input type="radio" name="size" value="{{ $size->value }}" id="{{ trim(strtolower(str_replace(' ', '', $size->value))) }}-size" data-size-id="{{ $size->id }}" data-size-quantity="">
                                            <label for="{{ trim(strtolower(str_replace(' ', '', $size->value))) }}-size" role="button" >{{ trim($size->value) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input name="quantity" type="text" value="1">
                                    </div>
                                    <a href="" data-product-id="{{ $product->id }}" class="primary-btn pd-cart add_to_cart">Add To Cart</a>
                                </div>
                                @endif
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{ $product->categories->name }}</li>
                                    <li><span>TAGS</span>: 
                                    @if (!empty($tags))
                                      {{ implode(', ', $tags->pluck('name')->toArray()) }} 
                                      {{-- pluck() : chỉ lấy dữ liệu với trường name, ->toArray() vì implode() chỉ hỗ trợ mảng, implode() :  --}}
                                    @endif
                                    </li>
                                </ul>
                                <div class="pd-share">
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
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews</a>
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
                                            {!! $product->content !!}
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
                                                        <span>(4)</span>
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
                                        {{-- <h4>2 Comments</h4>
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
                                        </div> --}}
                                        <div id="fb-root">
                                            <div class="fb-comments" data-href="{{ route('home.product-detail',['id'=>$product->id]) }}" data-width="100%" data-numposts="10"></div>
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

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Tương Tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('assets/client_view/img/products/women-1.jpg') }}" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('assets/client_view/img/products/women-2.jpg') }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $product->price
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('assets/client_view/img/products/women-3.jpg') }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('assets/client_view/img/products/women-4.jpg') }}" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    
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
                        // console.log(vCheck);
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


        function addToCart(event) {
            event.preventDefault();
            var productId = $(this).data('product-id');

            var urlAddToCart = "{{ route('product.add-to-cart',['id'=>'productId']) }}" ;
            urlAddToCart = urlAddToCart.replace('productId', productId);

            var colorId = $('input[name="color"]:checked').attr('data-color-id');
            var sizeId = $('input[name="size"]:checked').attr('data-size-id');
            var colorName = $('input[name="color"]:checked').val();
            var sizeName = $('input[name="size"]:checked').val();
            var quantity = $('input[name="quantity"]').val();
            
            // console.log(colorId + " - " + sizeId);
            $.ajax({
                type: 'GET',
                url: urlAddToCart,
                data: {
                    colorId : colorId,
                    sizeId : sizeId,
                    quantity : quantity,
                    colorName : colorName,
                    sizeName : sizeName,
                },
                success: function(data) {
                    // var jsonData = JSON.parse(data); // đổi dữ liệu thành json để đảm bảo, vì json nhẹ, được chuẩn hóa, dễ chuyển đổi
                    // console.log(jsonData);
                    // if(jsonData.code == 200) {

                    // }
                },
                error: function(data) {
                    console.error('Failed to make the request');
                },
            });
        }

        $(function() {
            $(document).on('click', '.add_to_cart', addToCart);
        });


        /*-------------------
            Quantity change
        --------------------- */
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
        	var $button = $(this);
        	var oldValue = $button.parent().find('input').val();
        	if ($button.hasClass('inc')) {
        		var newVal = parseFloat(oldValue) + 1;
        	} else {
        		// Don't allow decrementing below zero
        		if (oldValue > 0) {
        			var newVal = parseFloat(oldValue) - 1;
        		} else {
        			newVal = 0;
        		}
        	}
        	$button.parent().find('input').val(newVal);
        });
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="CvF2YSHw"></script>
    
@endsection