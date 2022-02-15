@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật bài viết
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
                        <form role="form" method="post" action="{{ URL::to('/update-post/'.$post->post_id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết </label>
                            <input type="text" name="post_title" class="form-control"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"
                             id="exampleInputEmail1" value="{{ $post->post_title }}" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Slug</label>
                            <textarea style="resize:none" rows="5" type="text"  name="post_slug" 
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này" class="form-control"  placeholder="Mô tả danh mục">
                            {{ $post->post_slug }}
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tóm lược</label>
                            <textarea style="resize:none" rows="5" type="text"  name="post_desc"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này" class="form-control" id="ckeditor5" placeholder="Mô tả danh mục">
                            {{ $post->post_desc }} 
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa</label>
                            <textarea style="resize:none" rows="5" type="text"  name="post_meta_keywords"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này" class="form-control"  placeholder="Mô tả danh mục">
                            {{ $post->post_meta_keywords }}
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa hiển thị</label>
                            <textarea style="resize:none" rows="5" type="text"  name="post_meta_desc" 
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"class="form-control" id="" placeholder="Mô tả danh mục">
                            {{ $post->post_meta_desc }} 
                        </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh tiêu đề </label>
                            <input type="file" name="post_image" class="form-control"                            
                            >
                            <img src="{{ asset('public/upload/post/'.$post->post_image) }}" height="100" width="100">
                        </div>
                        
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bài viết</label>
                                <select name="cate_post_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_post as $key=>$cate)

                                    <option {{ $post->cate_post_id=$cate->cate_post_id ? 'selected' : ''}} value="{{ $cate->cate_post_id }}">{{ $cate->cate_post_name }}</option>
                                   @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <textarea style="resize:none" rows="5" type="text"  name="post_content"  
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này" class="form-control" id="ckeditor6" placeholder="Mô tả danh mục">
                            {{ $post->post_content}} 
                        </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="post_status" class="form-control input-sm m-bot15">
                                @if($post->post_status==0)
                                <option selected value="0">Hiện</option>
                                <option value="1">Ẩn</option>
                               @else
                               <option  value="0">Hiện</option>
                                <option selected value="1">Ẩn</option>
                                @endif
                            </select>
                            
                        </div>
                        
                        <button type="submit"  name="update_post" class="btn btn-info">Cập nhật</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection