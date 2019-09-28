<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;

session_start();

class AdminControler extends Controller
{
    public function index(){

    	return view('Admin.admin_login');
    }



    // public function dashbord_view(){

    // 	return view('Admin.dashbord');
    // }



    public function vearify_login(Request $request)
    {

        $admin_em = $request->adminemail;
        $admin_pass = md5($request->adminpass);



        


        $result=DB::table('admin_table')
                 ->where('admin_email',$admin_em)
                 ->where('admin_password',$admin_pass)
                 ->first();
                


                if($result){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    return Redirect::to('/dashbor');
                }else{
                    Session::put('message','Email or Password Invalid');
                    return Redirect::to('/admin');
                }

    }

}
