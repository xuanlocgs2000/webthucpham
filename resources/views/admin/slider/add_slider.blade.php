@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm mới slide
                </header>
                <div class="panel-body">
                    <?php
		// $message = Session:: get('message');
		// if($message){
		// 	echo '<span class="text-alert">'.'!!!'.$message.'</span>';
		// 	Session::put('message',null);
		// }
	?>
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
                        <form role="form" method="post" action="{{ URL::to('/insert-slider') }} " enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên slider </label>
                            <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh </label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" type="text"  name="slider_desc" class="form-control"  placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="slider_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                               
                            </select>
                            
                        </div>
                        
                        <button type="submit"  name="add_slider" class="btn btn-info">Thêm mới</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection