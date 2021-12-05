<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;


session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');

    }
    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);

        
    }
    public function save_category_product(Request $request){
        $date = array();
        $data['Category_name']= $request->category_product_name;
        $data['Category_desc']= $request->category_product_desc;
        $data['Category_status']= $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-category-product');
       


        


    }
}
 