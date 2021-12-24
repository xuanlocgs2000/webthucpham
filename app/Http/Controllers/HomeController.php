<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request){
        //seo
        $meta_desc= "Đất trời farm, thực phẩm xanh, sạch, ngon";
        $meta_keywords = "thuc pham sach, thực phẩm sạch, thực phẩm nhà làm";
        $meta_title = "Thực phẩm bổ sung dinh dưỡng, thực phẩm sạch";
        $url_canonical = $request->url();
        //!seo
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status','0')->orderby('category_id','asc')->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status','0')->orderby('brand_id','asc')->get();
        $all_product = DB::table('tbl_product')
        ->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        return view('pages.home')
        ->with('category',$cate_product)
        ->with('brand', $brand_product)
        ->with('all_product',$all_product)
        ->with('meta_desc', $meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title', $meta_title)
        ->with('url_canonical',$url_canonical)
        

        ;
        
    }
    public function search(Request $request){
        $keyword =$request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status','0')->orderby('category_id','asc')->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status','0')->orderby('brand_id','asc')->get();
        $search_product = DB::table('tbl_product')
        ->where('product_name','like','%'.$keyword.'%')->get();

        return view('pages.product.search')
        ->with('category',$cate_product)
        ->with('brand', $brand_product)
        ->with('search_product', $search_product)

        ;
        


    }
}
