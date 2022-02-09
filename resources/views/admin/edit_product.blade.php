@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                    <div class="position-center">
                        @foreach ($edit_product as $key=>$pro)
                            
                        
                        <form role="form" method="post" action="{{ URL::to('/update-product/'.$pro->product_id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                            <input value="{{ $pro->product_name }}" type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input value="{{ $pro->product_quantity }}" type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc </label>
                            <input  value="{{ $pro->product_sale }}"  type="text" name="product_sale" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán </label>
                            <input  value="{{ $pro->product_price }}" type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh </label>
                            <input type="file" name="product_image" class="form-control" id="img" >
                            <img src="{{ URL::to('public/upload/product/'. $pro->product_image) }}" height="180" width="350">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả </label>
                            <textarea style="resize:none" rows="5" type="text"  name="product_desc" class="form-control" id="ckeditor3" >
                                {{ $pro->product_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chi tiết sản phẩm</label>
                            <textarea style="resize:none" rows="5" type="text"  name="product_content" class="form-control" id="ckeditor4">
                                {{ $pro->product_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_category" class="form-control input-sm m-bot15">
                                @foreach ( $cate_product as $key=> $cate)  
                                @if($cate->category_id ==$pro->category_id)
                                <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @else 
                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @endif
                                @endforeach                               
                               
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NSX</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ( $brand_product as $key=> $brand) 
                                @if($brand->brand_id == $pro->brand_id) 

                                <option selected value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @else 
                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @endif
                                @endforeach                               
                               
                            </select>
                               
                            </select>
                            
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                               
                            </select>
                            
                        </div>
                        
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật </button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
    @endsection