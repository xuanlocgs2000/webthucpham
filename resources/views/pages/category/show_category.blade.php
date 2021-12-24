
@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    
       <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                        @foreach ($category_name as $key=>$name)
                        <h2 class="title text-center">{{ $name->category_name }}</h2>

                        @endforeach
                       @foreach ($category_by_id as $key=>$product)                           
                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$product->product_id) }}">
                       <div class="col-sm-4">
                           <div class="product-image-wrapper" >
                               <div class="single-products" >
                                       <div class="productinfo text-center">
                                           <img src="{{ URL::to('public/upload/product/'.$product->product_image) }}" alt="" width="60" height="185" />
                                           <h2>{{number_format($product->product_price, 0, ',', '.').' '.'đ' }}</h2>
                                           <h4 class="price-sale" >{{number_format($product->product_sale, 0, ',', '.').' '.'đ' }}</h4>
                                           <p>{{$product->product_name}}</p>
                                           <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                       </div>
                                     
                               </div>
                               <div class="choose">
                                   <ul class="nav nav-pills nav-justified">
                                       <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                       <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>  
                    </a>                      
                       @endforeach
                       
                   </div><!--features_items-->
                   <div class="fb-share-button" data-href="http://localhost:81/webthucpham"
    data-layout="button_count" data-size="small"><a target="_blank"
     href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse"
      class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
      <div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="10"></div>
                   
@endsection