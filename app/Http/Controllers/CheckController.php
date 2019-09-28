<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();


class CheckController extends Controller
{   

	public function login_user(){

       

    	return view('pages.login_user');
    }
    public function user_registration(Request $request){

        $data = array();

        
    	$data['customer_name']=$request->name;
    	$data['customer_email']=$request->user_email;
    	$data['password']=$request->password;
    	$data['phone_no']=$request->mobile_no;


    	$customer_id = DB::table('customer_table')
    	      ->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->name);


    	return Redirect('/checkout');
    }

    public function checkout(){

       
         // return view('welcome')
         //   ->with('layout_contain.payment');
    	 return view('layout_contain.checkout');

    }


    public function user_login(Request $request){

        $customer_em = $request->user_email;
        $customer_pass = $request->password;



        


        $result=DB::table('customer_table')
                 ->where('customer_email',$customer_em)
                 ->where('password',$customer_pass)
                 ->first();
                


                if($result){
                  
                     Session::put('customer_id',$result->customer_id); 
                     return Redirect('/checkout');
                }else{
                    //Session::put('message','Email or Password Invalid');
                    return Redirect::to('/login-user');
                }

    	
    }
    public function user_logout(){

         Session::flush();

        return Redirect::to('/');
    }
    public function save_shiping_details(Request $request){

        $data = array();

        
        $data['email']=$request->shiping_email;
        $data['first_name']=$request->shiping_first_name;
        $data['last_name']=$request->shiping_last_name;
        $data['address']=$request->shiping_address;
        $data['mobile_no']=$request->shiping_mobile_no;
        $data['city']=$request->shiping_city;
     


        $shiping_id = DB::table('shipment_table')
              ->insertGetId($data);

        Session::put('shiping_id',$shiping_id);
       // Session::put('customer_name',$request->name);
        return Redirect::to('/payment');


    }
    
    public function payment(){

        return view('layout_contain.payment');
    }


    public function user_loginhome(){
      
      return Redirect::to('/login-user');

        
    }
}
