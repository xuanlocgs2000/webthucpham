@extends('layout')
 @section('content')

@foreach($product_details as $key => $value) 

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{ URL::to('/public/upload/product/'.$value->product_image)}}"  alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{ URL::to('/public/frontend/images/product-details/similar1.jpg') }}" alt=""></a>
                      <a href=""><img src="{{ URL::to('/public/frontend/images/product-details/similar2.jpg') }}" alt=""></a>
                      <a href=""><img src="{{ URL::to('/public/frontend/images/product-details/similar3.jpg') }}" alt=""></a>
                    </div>
                  
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ $value->product_name }}</h2>
            <p>Mã sản phẩm(ID): {{ $value->product_id }}</p>
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
                        <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                      
            <span>
                <h4 class="price-sale" >{{number_format($value->product_sale, 0, ',', '.').' '.'đ' }}</h4>
                <span>{{number_format($value->product_price,0,',','.').'  đ'}}</span>
                <label>Số lượng:</label>
                <input name="qty" type="number"   min="1"  class="cart_product_qty_{{$value->product_id}}"  value="1" />
                <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
            </span>
             <br>
            <input type="button" value="Mua ngay" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
            </form>
            <br>
                                            
            <p><b>Loại sản phẩm:</b> {{ $value->category_name }}</p>           
            <p><b>Tình trạng:</b> Còn hàng( {{ $value->product_quantity }} sp)</p>
            <p><b>Chứng chỉ :</b> BYT-ATVSTP 2008-2018</p>
            <p><b>Nhà cung cấp:</b> {{ $value->brand_name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active" ><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Nhà cung cấp</a></li>
            {{-- <li><a href="#tag" data-toggle="tab">Tag</a></li> --}}
            <li ><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
           <p>{!! $value->product_desc !!}</p>
            
           
        </div>
        
        <div class="tab-pane fade" id="companyprofile" >
           
            <p>{!! $value->brand_desc !!}</p>
            
           
        </div>
        
        {{-- <div class="tab-pane fade" id="tag" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>         

        </div> --}}
        
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->
@endforeach

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Gợi ý cho bạn</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($relate as $key=>$suggest)
                    
               
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products" >
                            <div class="productinfo text-center">
                                <img src="{{ URL::to('public/upload/product/'.$suggest->product_image) }}" alt="" width="60" height="185" />
                                <h2>{{number_format($suggest->product_price, 0, ',', '.').' '.'đ' }}</h2>
                                <h4 class="price-sale" >{{number_format($suggest->product_sale, 0, ',', '.').' '.'đ' }}</h4>
                                <p>{{$suggest->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                            </div>
                          
                    </div>
                    </div>
                </div> 
                @endforeach	
                                          
            </div>
          
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->

@endsection