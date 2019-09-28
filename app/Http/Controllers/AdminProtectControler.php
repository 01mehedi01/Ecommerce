<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;

session_start();

class AdminProtectControler extends Controller
{
    public function logout(){
       // Session::put('admin_name',null);
       // Session::put('admin_id',null);

        Session::flush();
       return Redirect::to('/admin');
    }



    public function dashbord_view(){

    	$this->AdminAuthnication();

    	return view('Admin.dashbord');
    }




    public function AdminAuthnication(){

    	$admin_id = Session::get('admin_id');

    	if($admin_id){
    		return;
    	}else{
    		 return Redirect::to('/admin')->send();
    	}
    }
}
