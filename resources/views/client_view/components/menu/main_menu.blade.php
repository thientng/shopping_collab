<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>Tất Cả Danh Mục</span>
                <ul class="depart-hover">
                    @foreach ($categories as $category)
                        <li class=""><a href="{{ route('home.category.product', ['slug'=> $category->slug,'id' => $category->id ]) }}">{{ $category->name }}</a></li>
                        
                    @endforeach
                    {{-- <li class="active"><a href="#">Women’s Clothing</a></li> --}}
                    
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                {{-- @foreach ($menus as $menu)
                    <li><a href="">{{ $menu->name }}</a>
                        @include('client_view.components.menu.child_menu',['menu' => $menu])
                    </li>
                @endforeach --}}

                {{-- <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./blog-details.html">Blog Details</a></li>
                        <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="./check-out.html">Checkout</a></li>
                        <li><a href="./faq.html">Faq</a></li>
                        <li><a href="./register.html">Register</a></li>
                        <li><a href="./login.html">Login</a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('home.san-pham') }}">Sản phẩm</a></li>
                <li><a href="{{ route('home.cart') }}">Giỏ hàng</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>