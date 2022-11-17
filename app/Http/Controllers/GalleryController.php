<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\CatePost;
session_start();

class GalleryController extends Controller
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
    public function add_gallery($product_id){
        $pro_id = $product_id;

        return view('admin.gallery.add_gallery')->with(compact('pro_id'));

    }
    
    public function insert_gallery(Request $request, $pro_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $image){
                $get_name_image=$image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));                
                $new_image= $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/upload/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name= $new_image;
                $gallery->gallery_image= $new_image;
                $gallery->product_id= $pro_id;
                $gallery->save();

            }
            Session::put('message','Thêm  thành công');
            return redirect()->back();
        }

    }
    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery= Gallery::find($gal_id);
        unlink('public/upload/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery= Gallery::find($gal_id);
        $gallery->gallery_name=$gal_text;
        $gallery->save();
    }
    public function select_gallery(Request $request){
        $product_id = $request->pro_id;        
        $gallery = Gallery::where('product_id',$product_id)->get();
        $gallery_count = $gallery->count();
        /*<th>Hình ảnh</th>*/
         /*<td>'.$gal->gallery_name.'</td>*/
        $output= '
        <form>
        '.csrf_field().'
        <table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>View</th>
            <th>Quản lí</th>
          </tr>
        </thead>
        <tbody>';
        if($gallery_count>0){
            $i=0;
            foreach($gallery as $key=>$gal){
                $i++;
                $output.='<tr>
                <td>'.$i.'</td>
                <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                
                <td><img src="'.url('public/upload/gallery/'.$gal->gallery_image).'" 
                 class="img-thumbnail" width="300" height="120"</td>

                <td>
                <button type="button" data-gal_id="'.$gal->gallery_id.'"
                 class="btn btn-xs btn-danger delete-gallery">Xóa</button>
                 </td>
              </tr>';
              
            }
        }
        else{
            $output.='<tr>
            <td colspan="4">Chưa được cập nhật</td>           
          </tr>';
        }
        $output.='
            </tbody>
            </table>
            </form>
        ';

        echo  $output;

    }
}
