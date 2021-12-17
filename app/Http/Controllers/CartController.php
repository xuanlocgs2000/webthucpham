<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $data = DB::table('tbl_product')->where('product_id',$productId)->get();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        

    }
}
