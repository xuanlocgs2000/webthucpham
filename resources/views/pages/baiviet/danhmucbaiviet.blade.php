@extends('layout')
 @section('content')

 <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">{{ $meta_title }}</h2>
                        <div class="product-image-wrapper" style="border: none">
                        @foreach ($post as $key=>$p)                           
                            
                            <div class="single-products" style="margin: 10px 0; padding:3px">
                                    <div class="text-center">
                                                                             

                                       <a href="{{ url('/bai-viet/'.$p->post_slug) }}">
                                        <img style="float: left; width:30%;padding: 5px;height:150px" href="{{ url('/bai-viet/'.$p->post_slug) }}"
                                         src="{{asset('public/upload/post/'.$p->post_image) }}" alt="{{ $p->post_slug }}"  />
                                        <h4 style="color: #000 ; padding:5px;">{{ $p->post_title }}</h4>
                                        
                                        <p >{!!$p->post_desc !!}</p>
                                    </a>
                                    <div class="text-right">
                                        <a href="{{ url('/bai-viet/'.$p->post_slug) }}" class="btn btn-default btn-sm">Chi tiết</a>
                                    </div>
                                </div>
                                  <div class="clearfix"></div>
                           
                           
                          
                        @endforeach
                    </div>
                    </div><!--features_items-->
                    {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$post->links()!!}
                       </ul> --}}
                   
@endsection