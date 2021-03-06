@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm mới danh mục sản phẩm
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
                        <form role="form" method="post" action="{{ URL::to('/save-category-product') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục </label>
                            <input type="text" name="category_product_name" class="form-control"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"
                             id="exampleInputEmail1" placeholder="Tên danh mục cha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" type="text"
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"  name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa</label>
                            <textarea style="resize:none" rows="5" type="text"  
                            data-validation="length" data-validation-length="min2" data-validation-error-msg="Không được để trống trường này"
                            name="category_product_keywords" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hiện</option>
                                <option value="1">Ẩn</option>
                               
                            </select>
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Cấp danh mục</label>
                                <select name="category_product_parent" class="form-control input-sm m-bot15">
                                    <option value="0">Cấp 1 </option>
                                    <option value="1">Cấp 2</option>
                                   
                                </select> --}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="category_product_parent" class="form-control input-sm m-bot15">
                                        <option value="0"> Danh mục cha(loại 1) </option>
                                        <option value="1"> Danh mục cha(loại 2) </option>
                                        @foreach ( $category_product as $key=> $cate)  
        
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                        @endforeach                               
                                       
                                    </select>
                                    
                                </div>

                            
                        </div>
                        
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm mới</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    @endsection