@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm mới NSX
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
                        <form role="form" method="post" action="{{ URL::to('/save-brand-product') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên NSX </label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" type="text"  name="brand_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                               
                            </select>
                            
                        </div>
                        
                        <button type="submit"  name="add_brand_product" class="btn btn-info">Thêm mới</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection