<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();


class PaymentController extends Controller
{
    public function order_place(Request $request){
        
        $payment_gatway = $request->payment_gateway;

        $shiping_id = Session::get('shiping_id');
        $customer_id = Session::get('customer_id');
       

        $pdata = array();

        
    	$pdata['payment_method']=$payment_gatway;
    	$pdata['payment_status']='pending';

    	$payment_id = DB::table('payment_table')
    	      ->insertGetId($pdata);

        
       $odata = array();

        
    	$odata['customer_id']=$customer_id;
    	$odata['shiping_id']=$shiping_id;
    	$odata['payment_id']=$payment_id;
    	$odata['order_total']=Cart::total();
    	$odata['order_status']='pending';

    	$order_id = DB::table('order_table')
    	      ->insertGetId($odata);

        $content = Cart::content();

        


        $oddata = array();

        foreach ($content as $v_content) {
        
    	$oddata['order_id']=$order_id;
    	$oddata['product_id']=$v_content->id;
    	$oddata['product_name']=$v_content->name;
    	$oddata['product_price']=$v_content->price;
    	$oddata['product_salse_quantity']=$v_content->qty;
       
         $order_id = DB::table('order_details_table')
    	      ->insert($oddata);

       }


       if($payment_gatway=='handcash'){
       	 return view('layout_contain.successorder');
       }else if($payment_gatway=='card'){
       	 echo "Payment successfull by card";
       }else{
       	  echo "Payment successfull by Bkash";
       }

    	//return view('pages.login_user');
    }


    public function order_manage(){
        // $this->AdminAuthnication();

        $allorder_info = DB::table('order_table')
                             ->join('customer_table','customer_table.customer_id','=','order_table.customer_id')
                             ->select('order_table.*','customer_table.customer_name')
                             ->get();



    	$manage_order = view('Admin.manage_order')
    	->with('allorder_info',$allorder_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.manage_order',$manage_order);
	}
}
