@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
        </div>
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
                                </form>
							</td>
							<td>
								<a class="btn btn-default check_out" href="{{ url('/del-all-product') }}">Xóa tất cả sản phẩm</a>	
							</td>	
							<td>
									<li>Tổng  <span>{{number_format($total,0,',','.')}}đ</span></li>
									<li>Thuế phí <span></span></li>
									<li>Phí vận chuyển <span>Free</span></li>
									<li>Thành tiền <span></span></li>							       
							</td>	
							<td> <a class="btn btn-default check_out" href="">Thanh toán</a>                   
								<a class="btn btn-default check_out" href="">Mã giảm gía</a>
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
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
{{-- <section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row"> --}}
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            {{-- <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng  <span>{{number_format($total,0,',','.')}}đ</span></li>
                        <li>Thuế phí <span></span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span></span></li>
                   </ul>                                          
                     <a class="btn btn-default check_out" href="">Thanh toán</a>                   
                     <a class="btn btn-default check_out" href="">Mã giảm gía</a>                          
                   
                       
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action--> --}}


@endsection
