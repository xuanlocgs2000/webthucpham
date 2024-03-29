<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- seo --}}
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <link  rel="icon" type="image/x-icon" href="" />
    {{-- !seo --}}
    {{-- <meta property="og:image" content="{{$image_og}}" /> --}}
    {{-- <meta property="og:site_name" content="http://localhost:81/webthucpham" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" /> --}}

    {{-- share --}}
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/css/formValidation.min.css')}}" type="text/css"/>


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon " type="image/jpg" href="{{ asset('public/frontend/images/home/logo5.png') }}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    {{-- <?php
        // echo  Session::get('customer_id');
        // echo  Session::get('shipping_id');

    ?> --}}
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +095 0188 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> datroifarm35@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{URL::to('public/frontend/images/home/logo2.png')  }}" alt="" width="145" height="39"  /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    VIE
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">VIE</a></li>
                                    <li><a href="#">ENG</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                   VNĐ
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">VNĐ</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                {{-- <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-user"></i> Tài khoản</a></li> --}}
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');

                                    if ($customer_id!=NULL && $shipping_id==NULL) {                                       
                                    
                                ?>
                                 <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                                <?php
                                      }elseif($customer_id!=NULL && $shipping_id!=NULL) {
                                    ?>
                                <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-lock"></i> Thanh toán</a></li>
                                    <?php
                                    }else {
                                    ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Thanh toán</a></li>

                                    <?php
                                    }
                                    ?>
                                <li><a href="{{ URL::to('/gio-hang ') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id!=NULL) {                                       
                                    
                                ?>
                                <li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                <?php
                                    }else {
                                    ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>

                                    <?php
                                    }
                                    ?>
                               

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li>
                                        @foreach ($category as $key=>$cate)
                                       
                                        @if($cate->category_parent==0 || $cate->category_parent==1 )   
                                        <li> <a href="{{ URL::to('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a></li>
                                         @endif   
                                           
                                        @endforeach
                                       
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($category_post as $key=>$listview)
                                       
                                            
                                        <li> <a href="{{ URL::to('/danh-muc-bai-viet/'.$listview->cate_post_slug) }}">{{  $listview->cate_post_name  }}</a></li>
                                            
                                           
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="{{ URL::to('/gio-hang ') }}">Giỏ hàng</a></li>
                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> --}}
                    <div class="col-sm-20">
                        {{-- <form action="{{URL::to('/tim-kiem')  }}" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box">
                                <input type="text" style="width:80%" name="keywords_submit" id="keywords" placeholder="Tìm kiếm"/>
                                <div id="search_ajax"></div>
                                <input type="submit" style="margin-top:0;color:#666" name="search_items" width="40px" class="btn btn-primary btn-sm" value="Tìm kiếm">
                                
                            </div>
                        </form> --}}
                        <form action="{{URL::to('/tim-kiem') }}" autocomplete="off" method="POST"> 
                            {{ csrf_field() }}
                            <div class="row">
                              <div class="col-xs-6 col-md-4">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search" name="keywords_submit" id="keywords"/>
                                  <div id="search_ajax"></div>
                                  <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                      <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            @php
                                $i=0;
                            @endphp
                            @foreach ($slider as $key=>$slide)   
                            @php
                                $i++;
                            @endphp                        
                            <div class="item {{ $i==1? 'active': '' }}">
                                <div class="col-sm-11">
                                    {{-- <h1><span>ĐẤT TRỜI</span>FARM</h1> --}}
                                    
                                    {{-- <p>{{ $slide->slider_desc }}</p> --}}
                                    {{-- <button type="button" class="btn btn-default get">Get it now</button> --}}
                                </div>
                                <div class="col-sm-11">
                                <img alt="{{ $slide->slider_desc }}" src="{{asset('public/upload/slider/'.$slide->slider_image)}}" alt="" height="100px" width="100%" class="img img-responsive">

                                    {{-- <img src="public/upload/slider/{{ $slide->slider_image }}" class="girl img-responsive" alt="" /> --}}
                                    {{-- <img src="{{ ('public/frontend/images/home/pricing.png') }}"  class="pricing" alt="" /> --}}
                                </div>
                            </div>
                           @endforeach                            
                            
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                                   
                            @foreach ($category as $key=>$cate)
                            <div class="panel panel-default">
                            @if($cate->category_parent==0)
                               
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cate->category_id }}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{ $cate->category_name }}</a>
                                    </h4>
                                </div>
                                <div id="{{ $cate->category_id }}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
                                            @foreach($category as $key =>$cate_sub)
                                            @if($cate_sub->category_parent==$cate->category_id)
											<li><a href="{{ URL::to('/danh-muc-san-pham/'.$cate_sub->category_id) }}">{{ $cate_sub->category_name }} </a></li>
											@endif
                                            @endforeach
										</ul>
									</div>
								</div>
                                @elseif($cate->category_parent==1)                               
                           
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                              </div>
                                @endif
                           
                            </div>
                         
                            @endforeach
                                      
                           
                            
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Nhà cung cấp</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand as $key=>$brand)
                                    <li><a href="{{ URL::to('/nha-cung-cap/'.$brand->brand_id) }}"> <span class="pull-right"></span>{{ $brand->brand_name }}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div><!--/brands_products-->
                        
                        {{-- <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range--> --}}
                        
                        {{-- <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping--> --}}
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    @yield('content')
               
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>DAT</span>TROI FARM</h2>
                            <p>Công ty TNHH MTV DATTROIFARM -37/17/NB/TB/Hà Nội</p>
                        </div>
                    </div>
                    {{-- <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ 'public/frontend/images/home/iframe1.png' }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ 'public/frontend/images/home/iframe2.png' }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ 'public/frontend/images/home/iframe3.png' }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div> --}}
                        
                        {{-- <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ 'public/frontend/images/home/iframe4.png' }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thực phẩm</a></li>
                                <li><a href="#">Hoa quả</a></li>
                                <li><a href="#">Đồ uống </a></li>
                                <li><a href="#">Hải sản</a></li>
                                <li><a href="#">Đồ hộp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2021 DATTROI FARM KMA. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/frontend/js/prettify.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
    

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="3tqTUgTJ"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="nN3lZzaq"></script>
<script>
    function remove_background(product_id){
        for(var count = 1; count<=5; count++){
            $('#'+product_id+'-'+count).css('color','#ccc');

        }
    }
    $(document).on('mouseenter','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        remove_background(product_id);
        for(var count = 1; count<=index; count++){
            $('#'+product_id+'-'+count).css('color','#fcc00');

        }
    });
    $(document).on('mouseleave','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        remove_background(product_id);
        for(var count = 1; count<=rating; count++){
            $('#'+product_id+'-'+count).css('color','#fcc00');

        }
    });
    $(document).on('click','.rating',function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url:"{{ url('/insert-rating') }}",
                method:"POST",
                data:{index:index,product_id:product_id,_token:_token},
                success:function(data){                 
                    if(data == 'done'){
                        alert("Bạn đã đánh giá "+index+" sao cho sản phẩm");
                    }
                    else{
                        alert("Không thể đánh giá");
                    }
                }
            });
    });

</script>

<script>
   $(document).ready(function(){
        $('#sort').on('change',function(){
            var url= $(this).val();
            if(url){
                window.location = url;
            }
            return false;

        });

   }); 

</script>

<script>
    $(document).ready(function(){
        load_comment();
        
        function load_comment(){
             var product_id= $('.comment_product_id').val();
             var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ url('/load-comment') }}",
                method:"POST",
                data:{product_id:product_id,_token:_token},
                success:function(data){                 
                    $('#comment_show').html(data);
                }
            });
        }
        $('.send-comment').click(function(){
            var product_id= $('.comment_product_id').val();
             var _token = $('input[name="_token"]').val();
             var comment_name = $('.comment_name').val();
             var comment_content = $('.comment_content').val();
             $.ajax({
                url:"{{ url('/send-comment') }}",
                method:"POST",
                data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                success:function(data){ 
                    
                    $('#notify_comment').html('<span class="text text-success">Cảm ơn bạn đã góp ý về sản phẩm của chúng tôi</span> ') ;           
                    load_comment();
                    $('#notify_comment').fadeOut(4000);
                    $('.comment_name').val('');
                    $('.comment_content').val('');
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ url('/autocomplete-ajax') }}",
                method:"POST",
                data:{query:query,_token:_token},
                success:function(data){
                    $('#search_ajax').fadeIn();//đổ kq
                    $('#search_ajax').html(data);
                }
            });

        }
        else{
            $('#search_ajax').fadeOut();
        }

    });
    $(document).on('click','.li_search_ajax',function(){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();

    });

</script>

<script type="text/javascript">
    $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop:true,
    slideMargin: 0,
    thumbItem: 3
    
    
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
       $('.add-to-cart').click(function(){
           var id = $(this).data('id_product');
           var cart_product_id =$('.cart_product_id_'+id).val();
           var cart_product_name =$('.cart_product_name_'+id).val();
           var cart_product_image =$('.cart_product_image_'+id).val();
           var cart_product_price =$('.cart_product_price_'+id).val();
           var cart_product_quantity =$('.cart_product_quantity_'+id).val();
           var cart_product_qty =$('.cart_product_qty_'+id).val();
           var _token = $('input[name="_token"]').val();
                    //   alert(cart_product_qty );
            if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                alert('Bạn chọn quá số sản phẩm có sẵn' + cart_product_quantity);
            }
            else{

           $.ajax({
            url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,cart_product_quantity:cart_product_quantity,_token:_token},
                        success:function(data){
                            
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                               

                        }
           });
        }
       });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
       $('.add-to-cart-details').click(function(){
           var id = $(this).data('id_product');
           var cart_product_id =$('.cart_product_id_'+id).val();
           var cart_product_name =$('.cart_product_name_'+id).val();
           var cart_product_image =$('.cart_product_image_'+id).val();
           var cart_product_quantity =$('.cart_product_quantity_'+id).val();
           var cart_product_price =$('.cart_product_price_'+id).val();
           var cart_product_qty =$('.cart_product_qty_'+id).val();
           var _token = $('input[name="_token"]').val();
                    //   alert(cart_product_qty );
           

            
           $.ajax({
            url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,_token:_token},
                        success:function(data){
                            
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                               

                        }
           });
           }
     
       });
    });
</script>
<script type="text/javascript">

    $(document).ready(function(){
      $('.send_order').click(function(){
          swal({
            title: "Xác nhận đơn hàng",
            text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Cảm ơn, Mua hàng",

              cancelButtonText: "Đóng,chưa mua",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
               if (isConfirm) {
                  var shipping_email = $('.shipping_email').val();
                  var shipping_name = $('.shipping_name').val();
                  var shipping_address = $('.shipping_address').val();
                  var shipping_phone = $('.shipping_phone').val();
                  var shipping_notes = $('.shipping_notes').val();
                  var shipping_method = $('.payment_select').val();
                  var order_fee = $('.order_fee').val();
                  var order_coupon = $('.order_coupon').val();
                  var _token = $('input[name="_token"]').val();

                  $.ajax({
                      url: '{{url('/confirm-order')}}',
                      method: 'POST',
                      data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                      success:function(){
                         swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                      }
                  });

                  window.setTimeout(function(){ 
                      location.reload();
                  } ,3000);

                } else {
                  swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                }
        
          });

         
      });
  });


</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
       
        if(action=='city'){
            result = 'district';
        }else{
            result = 'wards';
        }
        $.ajax({
            url : '{{url('/select-delivery-home')}}',
            method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(data){
               $('#'+result).html(data);     
            }
        });
    });
    });
      
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.district').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh =='' && xaid ==''){
                alert('Bạn chưa chọn địa chỉ giao hàng');
            }else{
                $.ajax({
                url : '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                success:function(){
                   location.reload(); 
                }
                });
            } 
    });
});
</script>
</body>
</html>}}}