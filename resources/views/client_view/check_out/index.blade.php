@extends('layouts.client_view')

@section('content')
    @include('client_view.components.breacrumb')
    @if (session('addOrder'))
        <script>alert('{{ session('addOrder') }}')</script>
        {{ session()->forget('addOrder') }}
    @endif
    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        @if (!auth()->guard('guest')->check())
                        <div class="checkout-content">
                            <a href="{{ route('login') }}" class="content-btn">Click Here To Login</a>
                        </div>
                        @endif
                        @php
                            $user = auth()->guard('guest')->user();
                        @endphp
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{ optional($user)->id }}">
                            <div class="col-lg-12">
                                <label for="fir">Full Name<span>*</span></label>
                                <input type="text" value="{{ optional($user)->name }}" name="name" id="fir">
                            </div>
                            {{-- <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" name="" id="last">
                            </div> --}}
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" name="email" value="{{ optional($user)->email }}" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="number" name="phone" value="{{ optional($user)->phone }}" id="phone">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" value="" id="town">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" name="address" value="{{ optional($user)->address }}" id="street" class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country<span>*</span></label>
                                <input type="text" value="Việt Nam" disabled id="cun">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input type="text" value="" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @php
                                        $totalAll = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                        <li class="fw-normal">{{ $item['name'] . ' ( '.$item['color'].' - '.$item['size'].' ) x '.$item['quantity']}}<span>{{ number_format($item['price']*$item['quantity']) }} ₫</span></li>
                                        @php
                                            if(isset($item)){
                                                $totalAll += $item['price']*$item['quantity'];
                                            }
                                        @endphp
                                    @endforeach

                                    <li class="fw-normal">Subtotal <span>{{ number_format($totalAll) }} ₫</span></li>
                                    <li class="total-price">Total <span>{{ number_format($totalAll) }} ₫</span></li>
                                    <input type="hidden" name="totalAll" value="{{ $totalAll }}">
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    @include('client_view.components.partner-logo')
@endsection