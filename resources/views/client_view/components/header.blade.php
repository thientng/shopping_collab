    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        tienthien2806@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">

                    @if (auth()->guard('guest')->check())
                        <a href="{{ route('logout') }}" class="login-panel"><i class="fa fa-user"></i>Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif

                    {{-- <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{ asset('assets/client_view/img/flag-1.jpg') }}" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="{{ asset('assets/client_view/img/flag-2.jpg') }}" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div> --}}
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('home.index') }}">
                                <img src="{{ asset('assets/client_view/img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <form action="{{ route('home.san-pham') }}" method="get" class="d-block advanced-search">
                            @csrf
                            {{-- <button disabled type="button" class="category-btn" style="padding-left: 55px;">Search ...</button> --}}
                            <div class="input-group">
                                <input value="Áo khoác" type="text" name="search" placeholder="What do you need?">
                                <button type="submit" style="right: -137px;"><i class="ti-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="{{ route('home.cart') }}">
                                    <i class="icon_bag_alt"></i>
                                    <span></span>
                                </a>
                            
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @php
                                                    $cart = session('cart');
                                                    $totalAll = 0;
                                                @endphp
                                                @if (!empty($cart))
                                                    @foreach ($cart as $id => $cartItem)
                                                    <tr>
                                                        <td class="si-pic"><img src="{{ asset('assets/client_view/img/select-product-1.jpg') }}" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{  number_format($cartItem['price']) }} x {{ $cartItem['quantity'] }}</p>
                                                                <h6>{{ $cartItem['name'] .' ('. $cartItem['color'].' - '. $cartItem['size'].' )' }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        if(isset($cartItem)){
                                                            $totalAll += $cartItem['price']*$cartItem['quantity'];
                                                        }
                                                    @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{ number_format($totalAll) }} ₫</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ route('home.cart') }}" class="primary-btn view-card">VIEW CARD</a>
                                        @if (!empty($cart))
                                        <a href="{{ route('order.index') }}" class="primary-btn checkout-btn">CHECK OUT</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="cart-price"></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Menu --}}
        @include('client_view.components.menu.main_menu')
        {{-- End Menu --}}
    </header>
    <!-- Header End -->