
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
        table.hehe {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            border: 1px solid #ddd;
        }

        .hehe th,.hehe td {
          border: 1px solid #ddd;
          padding: 8px;
          text-align: left;
        }

        .hehe th {
            background-color: #f2f2f2;
        }

        .hehe tfoot {
            font-weight: bold;
        }

        .hehe tfoot td {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                          <a href="https://rakeshmandal.com" title="logo" target="_blank">
                            <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Yêu cầu xác thực tài khoản Web Shopping</h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Chào {{ optional($order)->name }} cảm ơn bạn đã lựa chọn đặt mua sản phẩm của chúng tôi, xin vui lòng xác nhận đơn hàng để đơn hàng được vận chuyển thành công!. Xin cảm ơn. <br>
                                            <p> <strong style = 'font-size:14px'> Email đặt hàng : </strong>{{ optional(auth()->guard('guest')->user())->email ?auth()->guard('guest')->user()->email : $order->email  }}</p>
                                        </p>
                                        @php
                                            $cart = session('cart');
                                            $totalAll = 0;
                                            $x = 1;
                                        @endphp
                                        <table class="hehe" border="0" style="border: 1px solid;margin: 0 auto;width: 100%;">
                                          <thead>
                                            <th>Rank</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng phụ</th>
                                          </thead>
                                          <tbody>
                                            @foreach ($cart as $item)
                                                @php $subTotal = $item['price'] * $item['quantity'] @endphp
                                                    <tr>
                                                        <td>{{ $x +=1 }}</td>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['quantity'] }}</td>
                                                        <td>{{ number_format($item['price']) }} ₫</td>
                                                        <td>{{ number_format($subTotal) }} ₫</td>
                                                    </tr>
                                                @php
                                                    $totalAll += $subTotal;
                                                @endphp
                                            @endforeach
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                              <td colspan="4">Tổng số tiền bạn cần thanh toán</td>
                                              <td>{{ number_format($totalAll) }} ₫</td>
                                            </tr>
                                          </tfoot>
                                        </table>
                                        <a href="{{ route('order.verify',['token' =>$token,'id'=>$order->id]) }}"
                                            style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Xác Thực Tài Khoản</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.thien.tng.com</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>