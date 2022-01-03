@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div>
        </div><!--/breadcrums-->

                {{-- <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options--> --}}

        <div class="register-req">
            <p>Đăng nhập hoặc đăng kí để thanh toán và xem lịch sử mua hàng của bạn</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
               
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin mua hàng</p>
                        <div class="form-one">
                            <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                                @csrf
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                                
                                @if(Session::get('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                @else 
                                    <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                @endif

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                    @endforeach
                                @else 
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                @endif
                                
                                
                                
                                <div class="">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                          <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
                                                <option value="0">Qua chuyển khoản</option>
                                                <option value="1">Tiền mặt</option>   
                                        </select>
                                    </div>
                                </div>
                                <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
                             	
                            </form>
                            <form>
                                @csrf 
                         
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                  <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                
                                        <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                        
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                  <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                                        <option value="">--Chọn quận huyện--</option>
                                       
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                  <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        <option value="">--Chọn xã phường--</option>   
                                </select>
                            </div>
                             {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div> --}}
                            <input type="button" value="Địa chỉ giao hàng" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                           
                            </form>

                        </div>
                        {{-- <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="col-sm-12 clearfix">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                    <div class="table-responsive cart_info">
                        <form action="{{ url('/update-cart') }}" method="POST">
                            {{ csrf_field() }}    
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Hình ảnh</td>
                                    <td class="description">Tên sản phẩm</td>
                                    <td class="price">giá</td>
                                    <td class="quantity">số lượng</td>
                                    <td class="total">Thành tiền</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::get('cart')==true)
                                @php						
                                    $total=0;
                                @endphp
                                @foreach (Session::get('cart') as $key=>$cart )                   
                                @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp
                                {{-- @php
                                    echo '<pre>';
                                    print_r(Session::get('cart'));
                                    echo '</pre>';
                                @endphp --}}
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="{{asset('public/upload/product/'.$cart['product_image'])}}" width="45" alt="{{ $cart['product_name'] }}"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{ $cart['product_name'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                           
                                            
                                            <input class="cart_quantity" type="number" name="cart_qty[{{ $cart['session_id'] }}]" min="1" value="{{ $cart['product_qty'] }}" size="1">
                                  
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            {{number_format($subtotal,0,',','.')}}đ
            
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{ url('/del-product/'.$cart['session_id']) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach      
                                <tr>
                                    <td>
                                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default check_out">
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-default check_out" href="{{ url('/del-all-product') }}">Xóa tất cả sản phẩm</a>	
                                        </td>
                                        <td>@if(Session::get('coupon'))
                                            <a class="btn btn-default check_out" href="{{ url('/unset-coupon') }}">Không áp mã</a>	
                                            @endif</td>	
                                        <td> <?php
                                            $customer_id = Session::get('customer_id');
                                            if ($customer_id!=NULL) {                                       
                                            
                                        ?>
                                        
                                         <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                                        <?php
                                            }else {
                                            ?>
                                         <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                                        
                    
                                            <?php
                                            }
                                            ?></td>    
                                        {{-- <td>  --}}
                                            {{-- <a class="btn btn-default check_out" href="">Thanh toán</a>                   --}}
                                            
                                          
                                        {{-- </td>	 --}}
                                        <td>
                                            <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
                                            @if(Session::get('coupon'))
                                            <li>
                                                
                                                    @foreach(Session::get('coupon') as $key => $cou)
                                                        @if($cou['coupon_condition']==1)
                                                            Mã giảm : {{$cou['coupon_number']}} %
                                                            <p>
                                                                @php 
                                                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                                            
                                                                @endphp
                                                            </p>
                                                            <p>
                                                            @php 
                                                                $total_after_coupon = $total-$total_coupon;
                                                            @endphp
                                                            </p>
                                                        @elseif($cou['coupon_condition']==2)
                                                            Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
                                                            <p>
                                                                @php 
                                                                $total_coupon = $total - $cou['coupon_number'];
                                                            
                                                                @endphp
                                                            </p>
                                                            @php 
                                                                $total_after_coupon = $total_coupon;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                
                                                
    
                                            </li>
                                            @endif
    
                                            @if(Session::get('fee'))
                                            <li>	
                                                <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>
    
                                                Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li> 
                                                <?php $total_after_fee = $total - Session::get('fee'); ?>
                                            @endif 
                                            <li>Tổng còn:
                                            @php 
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after + Session::get('fee');
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total;
                                                    echo number_format($total_after,0,',','.').'đ';
                                                }
    
                                            @endphp
                                            </li>						        
                                        </td>
                                                            
                                    </tr>
                                    @else
                                    <tr >
                                        <td colspan="5"><center>
                                        @php
                                        echo'Giỏ hàng trống, hãy đi chợ nào!'	
                                        @endphp
                                        </td></center>
                                    </tr>
                                    @endif           
                            </tbody>
                        </form>
                        @if(Session::get('cart'))
                        <tr><td>
                            <form action="{{ url('/check-coupon') }}" method="POST">
                                @csrf
                                <input type="text"  class="form-control" placeholder="Mã giảm giá" name="coupon"><br>
                                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Mã giảm giá">
                                
                            </form>
                        </td></tr>
                        @endif
                        </table>
                    </div></div>		
            </div>
        </div>
        <div class="review-payment">
            <h2>Đơn hàng của bạn</h2>
        </div>
{{-- 
          <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
                
            </div> --}}
    </div>
</section> <!--/#cart_items-->

@endsection