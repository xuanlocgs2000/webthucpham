<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\CatePost;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Support\Facades\Redirect;


session_start();

class CategoryProduct extends Controller

{
    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if($admin_id){
         return   Redirect::to('dashboard');
        }
        else{
            return   Redirect::to('admin')->send();

        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        $category_product  = DB::table('tbl_category_product')
        ->where('category_parent',0)->orderBy('category_id','DESC')->get();
        return view('admin.add_category_product')->with('category_product',$category_product);

    }
    public function all_category_product(){
        $this->AuthLogin();
        $category_product  = DB::table('tbl_category_product')
        ->where('category_parent',0)->orderBy('category_id','DESC')->get();
        $all_category_product = DB::table('tbl_category_product')
        ->orderBy('category_parent','DESC')->paginate(8);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product)
        ->with('category_product',$category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);

        
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();     
        $category_product  = DB::table('tbl_category_product')
        ->where('category_parent',0)->orderBy('category_id','DESC')->get();   
        $data['category_name']= $request->category_product_name;
        $data['category_desc']= $request->category_product_desc;
        $data['meta_keywords']= $request->category_product_keywords;
        $data['category_status']= $request->category_product_status;
        $data['category_parent']= $request->category_product_parent ;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-category-product');   


    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Ẩn thành công');
        return Redirect::to('all-category-product');  
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Hiện thành công');
        return Redirect::to('all-category-product'); 
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $category_product  = DB::table('tbl_category_product')
        ->orderBy('category_id','ASC')->get();
        $edit_category_product = DB::table('tbl_category_product')
        ->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')
        ->with('edit_category_product',$edit_category_product)
        ->with('category_product',$category_product);
        return view('admin_layout')
        ->with('admin.edit_category_product',$manager_category_product)
        ;

    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name']= $request->category_product_name;
        $data['meta_keywords']= $request->category_product_keywords; 
        $data['category_desc']= $request->category_product_desc;
        $data['category_parent']= $request->category_product_parent ;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-category-product');  
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
     
        Session::put('message','Xóa thành công');
        return Redirect::to('all-category-product');  
    }
    //---!End function Admin
    //sản phẩm theo dánh mục
    public function show_category_home(Request  $request,$category_id){
        $category_post= CatePost::orderBy('cate_post_id','DESC')->get();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status','0')->orderby('category_id','asc')->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status','0')->orderby('brand_id','asc')->get();      
       
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->paginate(6);
        
        $category_name = DB::table('tbl_category_product')
        ->where('tbl_category_product.category_id',$category_id)
        ->limit(1)->get();
         foreach($category_by_id as $key =>$cate){
             $category_id= $cate->category_id;

         }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
             if($sort_by=='giam_dan'){
                 $category_by_id = Product::with('category')
                 ->where('category_id',$category_id)
                 ->orderBy('product_price','DESC')
                 ->paginate(6)->appends(request()->query());
             }
             elseif($sort_by=='tang_dan'){
                $category_by_id = Product::with('category')
                ->where('category_id',$category_id)
                ->orderBy('product_price','ASC')
                ->paginate(6)->appends(request()->query());
            }
            elseif($sort_by=='kytu_za'){
                $category_by_id = Product::with('category')
                ->where('category_id',$category_id)
                ->orderBy('product_name','DESC')
                ->paginate(6)->appends(request()->query());
            }
            elseif($sort_by=='kytu_az'){
                $category_by_id = Product::with('category')
                ->where('category_id',$category_id)
                ->orderBy('product_name','ASC')
                ->paginate(6)->appends(request()->query());
            }
            

        }
        else{
            $category_by_id = Product::with('category')
            ->where('category_id',$category_id)
            ->orderBy('product_id','DESC')
            ->paginate(6);
        }



        foreach ( $category_name as $key => $val) {
            # code...
            $meta_desc= $val->category_desc ;
            $meta_keywords = $val->meta_keywords ;
            $meta_title = $val->category_name;
            $url_canonical = $request->url();
            //seo
        }
        return view('pages.category.show_category')
        ->with('category',$cate_product)
        ->with('brand', $brand_product)
        ->with('category_by_id', $category_by_id)
        ->with('category_name',$category_name)
        ->with('meta_desc', $meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title', $meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider)
        ->with('category_post',$category_post);
    }
        
       
    
    public function export_csv(){
        return Excel::download(new ExcelExport , 'product.xlsx');
    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }

}

  