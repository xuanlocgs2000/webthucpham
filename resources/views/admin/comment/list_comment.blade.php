@extends('admin_layout')
@section('admin_content')
	<div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Ý kiến bình luận:
          </div>
          <div id="notify_comment"></div>
          {{-- <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
              <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
              </select>
              <button class="btn btn-sm btn-default">Apply</button>                
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div> --}}
          <div class="table-responsive">
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                
            <table class="table table-striped b-t b-light" id="myTable">
              <thead>
                <tr>
                 
                  <th>Duyệt</th>
                  <th>Name</th>
                  <th>Time</th>
                  <th>Bình luận</th>
                  <th>Sản phẩm</th>
                  <th>Quản lí</th>
                 
                 
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($comment as $key =>$comm)
                <tr>
                  {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
                  <td>
                      @if($comm->comment_status==1)
                        <input type="button" data-comment_status="0" data-comment_id="{{ $comm->comment_id }}"
                        id="{{  $comm->comment_product_id  }}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt ">
                      @else
                      <input type="button" data-comment_status="1" data-comment_id="{{ $comm->comment_id }}"
                      id="{{  $comm->comment_product_id  }}" class="btn btn-danger btn-xs comment_duyet_btn" value="Đã duyệt">
                      @endif
                
                    </td>
                  <td>{{ $comm->comment_name }}</td>
                  <td>{{ $comm->comment_date }}</td>
                  <td>{{ $comm->comment}}
                    <style>
                      ul.list_rep li{
                        list-style-type: decimal;
                        color: green;
                        margin: 5px 40px;
                      }
                    </style>
                    <ul class="list_rep">
                      Trả lời:
                      @foreach($comment_rep as $key => $comm_reply)
                      @if($comm_reply->comment_reply==$comm->comment_id)
                        <li>{{ $comm_reply->comment }}</li>
                        @endif
                      @endforeach
                    </ul>
                    @if($comm->comment_status==0)
                    <br><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="3" cols="65"></textarea>
                    <br><button class="btn btn-default btn-xs btn-reply-comment" 
                    data-product_id="{{  $comm->comment_product_id  }}" data-comment_id="{{ $comm->comment_id }}">Trả lời</button>
                  @endif
                    </td>
                 
                  {{-- <td><img src="public/upload/product/{{ $pro->product_image }}" alt="" height="60" width="100"></td> --}}
                  <td><a href="{{ url('/chi-tiet-san-pham/'.$comm->product->product_id) }}" target="_blank">{{$comm->product->product_name}}</a></td>
                  
                  
                   

                
                 
                 
                  <td>
                    <a href="" class="active styling-edit" ui-toggle-class="">
                      
                      <a onclick="return confirm('Bạn chắc chắn muốn xóa mục này?')" href="{{URL::to ('/delete-comment/'.$comm->comment_id) }}"" class="active styling-edit" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{-- <footer class="panel-footer">
            <div class="row">
              
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
              <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  {!!$all_product->links()!!}
                 </ul>
              </div>
            </div>
          </footer> --}}
        </div>
      </div>
      @endsection