@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật danh mục sản phẩm
                </header>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                 <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="panel-body">
                    @foreach ($edit_category_product as $key=>$edit_value)                     
                         <div class="position-center">
                        <form role="form" method="post" action="{{ URL::to('/update-category-product/'.$edit_value->category_id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục </label>
                            <input type="text" value="{{ $edit_value->category_name }}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" type="text"  name="category_product_desc" class="form-control" id="exampleInputPassword1" >{{ $edit_value->category_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa</label>
                            <textarea style="resize:none" rows="5" type="text"  name="category_product_keywords" class="form-control" id="exampleInputPassword1" placeholder="từ khóa">{{ $edit_value->meta_keywords }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">Cập nhật</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
    @endsection