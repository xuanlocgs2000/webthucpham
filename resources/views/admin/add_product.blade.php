@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm mới  sản phẩm
                </header>
                <div class="panel-body">
                    <?php
		$message = Session:: get('message');
		if($message){
			echo '<span class="text-alert">'.'!!!'.$message.'</span>';
			Session::put('message',null);
		}
	?>
                    <div class="position-center">
                        <form role="form" method="post" action="{{ URL::to('/save-product') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phâm </label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh </label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả </label>
                            <textarea style="resize:none" rows="5" type="text"  name="product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chi tiết sản phẩm</label>
                            <textarea style="resize:none" rows="5" type="text"  name="product_content" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_category" class="form-control input-sm m-bot15">
                                @foreach ( $cate_product as $key=> $cate)  

                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @endforeach                               
                               
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NSX</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ( $brand_product as $key=> $brand)  

                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
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
                        
                        <button type="submit" name="add_product" class="btn btn-info">Thêm mới</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection