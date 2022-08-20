@extends('layout_2')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Thanh toán giỏ hàng </li>
            </ol>
        </div><!--/breadcrums-->
        <div class="review-payment">
            <h2 class="">Xem lại giỏ hàng</h2>
        </div>

        <div class="table-responsive cart_info">
				
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="width: 10%">Hình ảnh</td>
                        <td class="description" style="width: 15%">Sản phẩm</td>
                        <td class="price" style="width: 15%">Đơn giá</td>
                        <td class="quantity" style="width: 5%">Số lượng</td>
                        <td class="total" style="width: 20%">Thành tiền</td>
                        <td style="width: 5%"></td>
                    </tr>
                </thead>
                
                <tbody>
                    <form action="{{URL::to('/update-cart')}}" method="post"> {{--Form-1--}}
                        {{ csrf_field() }}

                        @if(session()->get('cart') == true) {{--if-1--}}
                        @php
                            $total = 0;	
                            $total_coupon = 0;	
                        @endphp
                        @foreach (session()->get('cart') as $item => $cart)
                            @php
                            $sub_total = $cart['product_price'] * $cart['product_qty'];	
                            $total += $sub_total; 
                            @endphp

                        <tr>
                            <td class="cart_product">
                                <a href=""><img width="90" src="{{URL::to('public/upload/product/'.$cart['product_image'])}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cart['product_name']}}</a></h4>
                                <p>Web ID: {{$cart['product_id']}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cart['product_price'],0,',','.')}} VNĐ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    
                                        {{-- <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a> --}}

                                        <input style="width: 50px; height: 34px; margin-right: 6px" size="2" type="number"
                                        class="cart_quantity_input" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                        
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($sub_total,0,',','.')}} VNĐ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-product-cart/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="" colspan="2" style="text-align: center">
                                    <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-info">
                                    <a href="{{URL::to('/del-all')}}" class="btn btn-info">Xóa tất cả</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="panel-body panel-body-style">
                                        <p class="text-center">Chọn nơi giao hàng</p>
                                        <div class="">
                                            <form action="{{URL::to('/save-brand-product')}}" method="POST" class="form-horizontal" role="form">
                                                {{ csrf_field() }}
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Chọn thành phố</label>
                                                    <div class="col-sm-6">
                                                        <select name="city" id="city" class="form-control choose city">
                                                            <option value="">----Chọn tỉnh thành phố----</option>
                                                            @foreach ($thanhpho as $item => $tp)                                     
                                                            <option value="{{$tp->matp}}">{{$tp->name_tp}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Chọn quận huyện</label>
                                                    <div class="col-sm-6">
                                                        <select name="province" id="province" class="form-control choose province">
                                                            <option value="">----Chọn quận huyện----</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Chọn xã phường</label>
                                                    <div class="col-sm-6">
                                                        <select name="wards" id="wards" class="form-control wards">
                                                            <option value="">----Chọn xã phường----</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button type="button" name="calculate_delivery" class="btn btn-info calculate_delivery">OK</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                        <div id="load-delivery">
                                            
                                        </div>
                                    </div>
                                </td>
                                
                                <td></td>
                                <td>
                                    <div class="row">
                                        <div class="total_area">
                                            <ul>
                                                <li>Tổng tiền<span>{{number_format($total,0,',','.')}} VNĐ</span></li>
                                                <li>Phí phát sinh <span>0</span></li>
                                                @if(session()->get('coupon'))
                                                    @foreach (session()->get('coupon') as $key => $value)
                                                        @if($value['coupon_condition'] == 1)
                                                            <li>Mã ưu đãi giảm<span>{{$value['coupon_number']}} %</span></li>
                                                            @php
                                                                $total_coupon = ($total*$value['coupon_number']/100);
                                                                echo '<li>Tiền giảm<span>'.number_format($total_coupon,0,',','.').'VNĐ</span></li>';
                                                            @endphp
                                                        @elseif($value['coupon_condition'] == 2)
                                                        <li>Mã ưu đãi giảm<span>{{number_format($value['coupon_number'])}}đ</span></li>
                                                            @php
                                                                $total_coupon = $value['coupon_number'];
                                                                echo '<li>Tiền giảm<span>'.number_format($total_coupon,0,',','.').'VNĐ</span></li>';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if(session()->get('fee'))
                                                    <li>Phí vận chuyển<span id="feeship">{{number_format(session()->get('fee'),0,',','.')}} VNĐ</span></li>
                                                @endif    
                                                <li style="background: #ccc; color:black; font-weight:600">Tổng thanh toán<span>
                                                    <?php
                                                    $total = $total - $total_coupon + session()->get('fee');
                                                    session()->put('total',$total);
                                                    ?>
                                                    {{number_format($total,0,',','.')}} VNĐ</span></li>
                                                    
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr><td style="height: 40px"></td></tr>
                            <tr>
                                <td colspan="3" class="panel-body panel-body-style" style="margin-top:20px">
                                    <p class="text-center">Thông tin chi tiết</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px">
                                    <p>Tên người nhận:</p>
                                    <p>Số điện thoại:</p>
                                    <p>Địa chỉ:</p>
                                    <p>Lời nhắn:</p>
                                </td>
                                <td style="font-size: 16px">
                                    @foreach ($show_shipping as $item => $shipping)
                                    <p>{{$shipping->shipping_name}}</p>
                                    <p>{{$shipping->shipping_phone}}</p>
                                    <p>{{$shipping->shipping_address}}</p>
                                    <p>{{$shipping->shipping_message}}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="2"><img src="{{asset('public/front-end/images/cart/cart-empty.png')}}" alt=""></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="2"><a href="{{URL::to('/trang-chu')}}" class="btn btn-default check_out" style="margin-left: 60px">SHOPPING NOW</a></td>
                            </tr>
                        @endif
                    </form>
                    @if(session()->get('cart'))
                    <tr>     
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">
                            <form action="{{URL::to('/check-coupon')}}" method="post">
                                {{ csrf_field() }}
                                <div class="row col-sm-11 col-sm-offset-0">
                                    <input type="text" class="col-sm-8" name="coupon_code" placeholder="Nhập mã giảm giá" style="height: 34px; margin: 0 10px" >
                                    <input type="submit" class="col-sm-3" name="check_coupon" value="OK" style="height: 34px">
                                    @php
                                    $message = session()->get('alert');
                                    if($message){
                                        echo $message;
                                    }
                                    @endphp
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td><a href="{{URL::to('/add-shipping/'.session()->get('customer_id'))}}" class="btn btn-default check_out">Thêm địa chỉ giao hàng mới</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{URL::to('/order-place')}}" method="post" class="text-center">
            {{ csrf_field() }}
            <div class="payment-option-title">Hình thức thanh toán</div>
            <div class="payment-options">
                <span>
                    <label><input type="radio" name="payment_method" value="1" size="20"><i class="fa-solid fa-credit-card"></i> Thanh toán qua thẻ</label>
                </span>
                <span>
                    <label><input type="radio" name="payment_method" value="2"><i class="fa-solid fa-money-bill-1-wave"></i> Thanh toán khi nhận hàng</label>
                </span>
                {{-- <span>
                    <label><input type="radio" name="payment_method" value="3"> Paypal</label>
                </span> --}}
            </div>
                <div style="position: relative; top:20px; margin-bottom:20px">
                    @php
                    $vnd_to_usd = $total / 23087.05;
                    @endphp
                    <div id="paypal-button"></div> 
                    <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                </div>
                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                    <script>
                        var usd = document.getElementById('vnd_to_usd').value;
                        // alert(usd);
                      paypal.Button.render({
                        // Configure environment
                        env: 'sandbox',
                        client: {
                          sandbox: 'AYY3ht16EQxOyQ_s7BIPoWRfUJG-dg_FWtHn4PMyVmFBnZFkYla-beKlF4UHL1G7ZkqNFseX-zSsc2iz',
                          production: 'demo_production_client_id'
                        },
                        // Customize button (optional)
                        locale: 'en_US',
                        style: {
                          size: 'large',
                          color: 'gold',
                          shape: 'pill',
                        },
                    
                        // Enable Pay Now checkout flow (optional)
                        commit: true,
                    
                        // Set up a payment
                        payment: function(data, actions) {
                          return actions.payment.create({
                            transactions: [{
                              amount: {
                                total: `${usd}`,
                                currency: 'USD'
                              }
                            }]
                          });
                        },
                        // Execute the payment
                        onAuthorize: function(data, actions) {
                          return actions.payment.execute().then(function() {
                            // Show a confirmation message to the buyer
                            window.alert('Bạn đã thanh toán thành công!');
                            window.location.href = "{{url('/order-place-paypal')}}";
                          });
                        }
                      }, '#paypal-button');
                    
                    </script>
            <input type="submit" name="send_order" class="btn btn-default check_out" value="ĐẶT HÀNG NGAY" style="font-size: 18px">
        </form> 
    </div>
</section> <!--/#cart_items-->

@endsection