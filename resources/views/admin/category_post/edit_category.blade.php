@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật danh mục bài viết
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
                        <form role="form" method="post" action="{{ URL::to('/update-category-post/'. $category_post->cate_post_id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục </label>
                            <input type="text" value="{{ $category_post->cate_post_name }}" name="cate_post_name" class="form-control"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"
                             id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Slug</label>
                            <textarea style="resize:none" rows="5" type="text"  name="cate_post_slug" class="form-control"  placeholder="Mô tả danh mục">{{ $category_post->cate_post_slug }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" type="text"  name="cate_post_desc" class="form-control"  placeholder="Mô tả danh mục">
                                {{ $category_post->cate_post_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="cate_post_status" class="form-control input-sm m-bot15">
                                @if($category_post->cate_post_status==0 )
                                <option selected value="0">Hiện</option>
                                <option value="1">Ẩn</option>
                                @else
                                <option value="0">Hiện</option>
                                <option  selected value="1">Ẩn</option>
                                @endif
                            </select>
                            
                        </div>
                        
                        <button type="submit"  name="update_post_cate" class="btn btn-info">Cập nhật</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection