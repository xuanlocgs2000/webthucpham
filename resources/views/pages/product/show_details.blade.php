@extends('layout')
 @section('content')

@foreach($product_details as $key => $value) 

<div class="product-details"><!--product-details-->
    <style>
        .lSSlideOuter .lSPager.lSGallery img {
            display: block;
            height: 120px;
            max-width: 100%;
}
    li.active {
        border: 2px solid #218c74;
    }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background: none">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/danh-muc-san-pham/'.$cate_slug ) }}">{{ $product_cate }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $meta_title }}</li>
        </ol>
      </nav>
    <div class="col-sm-5">
        <ul id="lightSlider">
            @foreach($gallery as $key=>$gal)
            <li data-thumb="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}" 
            data-src="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}">
            <img width="100%" src="{{ asset('public/upload/gallery/'.$gal->gallery_image) }}" alt="">
            </li>
            @endforeach
        </ul>
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
            <input type="button" value="Mua ngay" class=" btn btn-lg add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
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
            <li ><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Nhà cung cấp</a></li>
            {{-- <li><a href="#tag" data-toggle="tab">Tag</a></li> --}}
            <li  class="active"  ><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane " id="details" >
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
        
        <div class="tab-pane  fade active in " id="reviews" >
            <div class="col-sm-12">
                {{-- <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul> --}}
                <style>
                    .style_comment{
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        background: #f1f1e9;
                    }
                </style>
                <form action="">
                    @csrf
                    <input type="hidden" class="comment_product_id" name="comment_product_id" value="{{ $value->product_id }}">
                    <div id="comment_show"></div>
                
                
            </form>
                <p><b>Nhận xét của bạn về sản phẩm</b></p>
                 <ul class="list-inline rating" title="Average Rating">
                     @for($count=1; $count<=5; $count++)
                     @php
                        if($count<=$rating){
                            $color= 'color:#ffcc00;';
                        }
                        else{
                            $color= 'color:#ccc;';

                        }
                     @endphp
                <li title="star_rating" id="{{ $value->product_id }}-{{ $count }}" 
                    data-index="{{ $count }}" data-product_id="{{$value->product_id}}"
                    data-rating="{{ $rating }}" class="rating" style="cursor:pointer; {{ $color }} font-size:30px">
                    &#9733; 

                </li>
            @endfor
                 </ul>
                <form action="#">  
                    <span>
                        <input style="width:40%; margin-left:0" class="comment_name"
                         type="text" placeholder="Name"/>   
                    </span>               
                                          
                    
                    <textarea name="comment" class="comment_content" ></textarea>
                    <div id="notify_comment"></div>

                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right send-comment">
                        Bình luận
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