<div class="container cart-box">
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-table">
                <table data-url="{{ route('product.update-cart') }}" data-url-delete-cart="{{ route('product.delete-cart') }}" id="cart">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Attribute</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th><i class="ti-close"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $totalAll = 0;
                            @endphp
                        @if (!empty($cart))
                            @foreach ($cart as $id => $cartItem)
                            <tr>
                                <td class="cart-pic first-row"><img style="width: 170px;object-fit: cover;height: 100%;" src="{{ $cartItem['image'] }}" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5>{{ $cartItem['name'] }}</h5>
                                </td>
                                <td class="p-attribute first-row">
                                    {{ $cartItem['color'].' - '. $cartItem['size'] }}
                                </td>
                                <td class="p-price first-row">{{  number_format($cartItem['price']) }}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input data-id="{{ $id }}" min="1" max="{{ $cartItem['maxQuantity'] }}" data-pro-attr-quantity="{{ $cartItem['maxQuantity'] }}"  type="number" class="quantity-input" id="quantity" value="{{$cartItem['quantity'] }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">{{  number_format($cartItem['price']*$cartItem['quantity']) }}</td>
                                <td class="close-td first-row"><i data-id="{{ $id }}" class="ti-close"></i></td>
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="cart-buttons">
                        <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                        <a href="#" class="primary-btn up-cart">Update cart</a>
                    </div>
                    <div class="discount-coupon">
                        <h6>Discount Codes</h6>
                        <form action="#" class="coupon-form">
                            <input type="text" placeholder="Enter your codes">
                            <button type="submit" class="site-btn coupon-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-4">
                    <div class="proceed-checkout">
                        <ul>
                            <li class="subtotal">Subtotal <span>{{  number_format($totalAll) }} VND</span></li>
                            <li class="cart-total">Total <span>{{  number_format($totalAll) }} VND</span></li>
                        </ul>
                        <a href="{{ route('order.index') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>