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

      
        <div class="review-payment">
            <h2>Đơn hàng của bạn</h2>
            <div class="table-responsive cart_info">
                <?php
                    $content =Cart::content();   
                    // echo '<pre>';
                    //     print_r ($content); 
                    //  echo '</pre>' ;
    
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">giá</td>
                            <td class="quantity">số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $v_content)                   
                        
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ URL::to('public/upload/product/'.$v_content->options->image) }}" width="45" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $v_content->name }}</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($v_content->price, 0, ',', '.').' '.'đ' }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                                    {{ csrf_field() }}    
                                    {{-- tăng giảm số lượng --}}
                                    {{-- <a class="cart_quantity_up" href=""> + </a> --}} 
                                    <input class="cart_quantity_input" type="number" name="cart_quantity" value="{{ $v_content->qty }}" size="1">
                                    {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart" class="form-control">
    
                                    <input type="submit" value="thay đổi" name="update_qty" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    <?php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo   number_format($subtotal, 0, ',', '.').' '.'đ'
                                    ?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach                 
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <h4 style="margin:40px 0; font-size:20px">Hình thức thanh toán:</h4>
        <form action="{{ URL::to('/order-place') }}" method="POST">
            {{ csrf_field() }}   
            <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox">Chuyển khoản </label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Thanh toán trực tiếp</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> VNPAY</label>
                </span>
                <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary">
            </div>
        </form>
          
    </div>
</section> <!--/#cart_items-->

@endsection