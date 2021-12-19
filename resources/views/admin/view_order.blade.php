@extends('admin_layout')
@section('admin_content')
	<div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Thông tin khách hàng
          </div>
        
          <div class="table-responsive">
            <?php
            $message = Session:: get('message');
            if($message){
              echo '<span class="text-alert">'.'!!!'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>                 
                  <th>Tên khách hàng</th>
                  <th>SĐT</th>                
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>               
                <tr>                 
                  <td>{{ $order_by_id->customer_name }}</td>
                  <td>{{ $order_by_id->customer_phone }}</td>              
                </tr>
                </tbody>
            </table>
          </div>
         
        </div>
      </div>
      <br>
      <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Thông tin vận chuyển
          </div>
        
          <div class="table-responsive">
            <?php
            $message = Session:: get('message');
            if($message){
              echo '<span class="text-alert">'.'!!!'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                 
                  <th>Tên người nhận</th>
                  <th>Địa chỉ</th>                                
                  <th>SĐT</th>                                
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>               
                <tr>                 
                  <td>{{ $order_by_id->shipping_name }}</td>
                  <td>{{ $order_by_id->shipping_address }}</td>                                 
                  <td>{{ $order_by_id->shipping_phone }}</td>                                 
                </tr>
               
              </tbody>
            </table>
          </div>         
        </div>
      </div>
      <br>
      <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            Chi tiết đơn hàng
          </div>
          <div class="row w3-res-tb">
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
          </div>
          <div class="table-responsive">
            <?php
            $message = Session:: get('message');
            if($message){
              echo '<span class="text-alert">'.'!!!'.$message.'</span>';
              Session::put('message',null);
            }
          ?>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th style="width:20px;">
                    <label class="i-checks m-b-none">
                      <input type="checkbox"><i></i>
                    </label>
                  </th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Giá</th>
                  <th>Tổng tiền</th>

                 
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                
                <tr>                       
                  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{ $order_by_id->product_name }}</td>
                  <td>{{ $order_by_id->product_sales_quantity }}</td>
                  <td>{{ $order_by_id->product_price }}</td>
                  <td>{{  $order_by_id->product_price* $order_by_id->product_sales_quantity}}</td>                 
                 
                  <td>
                    <a href="" class="active styling-edit" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-sucsess text-active"></i></a>
                      <a onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này không?')" href="" class="active styling-edit" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              
              <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
              </div>
              <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                  <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                  <li><a href="">1</a></li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>
          </footer>
        </div>
      </div>
   
      @endsection