<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart; 
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){     
        
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

        
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        cart::add($data);
        return Redirect::to('/show_cart');   
        

    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status','0')->orderby('category_id','asc')->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status','0')->orderby('brand_id','asc')->get();
        return view('pages.cart.show_cart')
        ->with('category',$cate_product)
        ->with('brand', $brand_product);
    }
}
