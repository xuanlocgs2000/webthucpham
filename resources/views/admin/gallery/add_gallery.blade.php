@extends('admin_layout');
@section('admin_content')

  <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm chi tiết sản phẩm
                </header>
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
        <form action="{{ url('/insert-gallery/'.$pro_id)}}"
        method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
            <div class="col-md-3" align="right">

            </div>
            <div class="col-md-6" >
                <input type="file" id="file" class="form-control" name="file[]" accept="image/*" multiple>
                <span id="error_gallery"></span>
            </div>
            <div class="col-md-3" >
                <input type="submit" name="upload" name="loadimg" value="Tải lên" class="btn btn-success ">
            </div>


        </div>
    </form>
        
     <div class="panel-body">
     
    <input type="hidden" value="{{ $pro_id }} " name="pro_id" class="pro_id">
    <form action="">
        @csrf
        <div id="gallery_load">
            
        </div>
    </form>
    
    
                   

                </div>
            </section>

    </div>
</div>
    @endsection