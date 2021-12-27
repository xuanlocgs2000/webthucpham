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
        Cart::add($data);
        Cart::setGlobalTax(5);
        // Cart::destroy();
        return Redirect::to('/show-cart');   
        

    }
    public function show_cart(Request $request){
        $meta_desc= "Giỏ hàng";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')
        ->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')
        ->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')
        ->with('category',$cate_product)
        ->with('brand', $brand_product)
        ->with('meta_desc', $meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title', $meta_title)
        ->with('url_canonical',$url_canonical);
    }
    public function delete_to_cart($rowId){
        Cart::remove($rowId);
        return Redirect::to('/show-cart');  

    }
    public function update_cart_quantity(Request $request){
        $rowId= $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');  
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        print_r($data);
    }
}
