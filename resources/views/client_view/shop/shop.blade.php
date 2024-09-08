@extends('layouts.client_view')

@section('script')
    <script src="https://cdn.tailwindcss.com"></script> 
    <script>
            var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
    </script>
@endsection

@section('css')
<style>
    .caret {
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: transform 0.3s ease; /* Thêm hiệu ứng chuyển động */
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
        transition: transform 0.3s ease; /* Thêm hiệu ứng chuyển động */
    }

    .caret-down::before {
        transform: rotate(90deg);
    }

    .nested {
        display: none;
        overflow: hidden;
        transition: max-height 0.3s ease; /* Thêm hiệu ứng chuyển động */
        max-height: 0;
    }
    .nested.active >li{
        transition: max-height 0.3s ease; /* Thêm hiệu ứng chuyển động */
    }

    .active {
        display: block;
        max-height: 1000px; /* Số lớn để đảm bảo hiển thị tất cả nội dung */
    }
</style>
@endsection

@section('content')
    @include('client_view.components.breacrumb')

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                {{-- sidebar --}}
                @include('client_view\components\sidebar')
                {{-- sidebarEnd --}}

                <div class="col-lg-9 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="{{ $product->feature_image_path }}" alt="">
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                {{-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> --}}
                                                <li class="quick-view"><a href="{{ route('home.product-detail',['id' => $product->id]) }}">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">{{ $product->categories->name }}</div>
                                            <a href="#">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($product->price) }} ₫
                                                {{-- <span>$35.00</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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
@endsection