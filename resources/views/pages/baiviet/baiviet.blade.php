@extends('layout')
 @section('content')

 <div class="features_items"><!--features_items-->
                        <h2 style="margin: 0; position: inherit; font-size:22px" class="title text-center">{{ $meta_title }}</h2>
                        <div class="product-image-wrapper" style="border: none">
                        @foreach ($post as $key=>$p)                           
                            
                            <div class="single-products" style="margin: 10px 0; padding:3px">
                                    {!!$p->post_content !!}
                                </div>
                                  <div class="clearfix"></div>
                        
                        @endforeach
                    </div>
                    </div><!--features_items-->
                    {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$all_product->links()!!}
                       </ul> --}}
                       
                       <h2 style="margin: 0; font-size: 22px" class="title text-center">Bài viết cho bạn</h2>
                       <style>
                        ul.post_relate li{
                            list-style-type: disc;
                            font-size: 18px;
                            padding: 6px;
                        }
                        ul.post_relate li a {
                            color: green;
                        }
                        ul.post_relate li a:hover{
                            color: chocolate;
                        }
                    </style>
                       <ul class="post_relate">
                           @foreach($related as $key=>$post_relate)
                           <li>
                               
                            <a href="{{ url('/bai-viet/'.$post_relate->post_slug) }}">{{ $post_relate->post_title }}</a> 
                            
                        </li>
                        @endforeach
                       </ul>

                   
@endsection