<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Login; //sử dụng model Login
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{   
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
 Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',
                    

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
             Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

    public function AuthLogin(){
        $admin_id =Session::get('admin_id');
        if($admin_id){
         return   Redirect::to('dashboard');
        }
        else{
            return   Redirect::to('admin')->send();

        }
    }
    public function index(){
    
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');

}
    public function dashboard(Request $request){
         $this->AuthLogin();
        // $data = $request->all();
        // $admin_email =$data['admin_email'];
        // $admin_password =md5($data['admin_password']);
        // $login= Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // $login_count= $login->count();
        // if($login_count>0){
        //     Session::put('admin_name',$login->admin_name);
        //     Session::put('admin_id',$login->admin_id);
        //     return Redirect::to('/dasboard');
        // } else {
        //     Session::put('message','Thông tin đăng nhập chưa chính xác');
        //     return Redirect::to('/admin');

        // }
        

        $admin_email = $request->admin_email; 
        $admin_password= md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
       if($result){
           Session::put('admin_name',$result->admin_name);
           Session::put('admin_id',$result->admin_id);
           return Redirect::to('/dashboard');

           
       }
       else{
           Session::put('message','Thông tin tài khoản chưa chính xác');

           return Redirect::to('/admin');

       }       

    
}
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }

}