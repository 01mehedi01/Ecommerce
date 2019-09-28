<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

use Illuminate\Database\Eloquent\Model;
use PDO;
use App\Http\Controllers\Controller;


session_start();

class sliderController extends Controller
{
    public function add_slider(){

    	return view('Admin.add_slider');

    }

    public function all_slider(){

    	$allslider_info = DB::table('slider_table')->get();
        
    	$manage_slider = view('Admin.all_slider')
    	->with('allslider_info',$allslider_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.all_slider',$manage_slider);
    	
    }

    public function save_slider(Request $request){

        $data = array();
    	$data['publication_status']=$request->publication_status;
        $image = $request->file('slider_image');

        if($image){

        	$image_name =str_random(20);
        	$text = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$text;
        	$upload_path='slider/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success){

        		$data['slider_image']=$image_url;

        		DB::table('slider_table')->insert($data);
    	            Session::put('message','Slider Added Successfully !!');


                   return view('Admin.add_slider');
        	}
        }

        $data['slider_image']='';
    	  DB::table('slider_table')->insert($data);
    	  Session::put('message','Slider Added Successfully without image!!');


        return view('Admin.add_slider');
    	
    }

    public function delete_slider($slider_id)
    {
      //$this->AdminAuthnication();
        
        DB::table('slider_table')
           ->where('slider_id',$slider_id)
             ->delete();
        Session::put('message','Slider Delete Successfully !!');

        return Redirect::to('/all-slider');

     }


     public function api_fun()
     {
      //$this->AdminAuthnication();
       // $result = DB::table('product_table')
       //                       ->select('product_table.*')
       //                       ->get();
      // mysqli_num_rows($result) > 0

         // DB::setFetchMode(PDO::FETCH_ASSOC);
         // $result =  DB::table("product_table")
         //         ->select('product_table.*')
         //         ->get();       










        $quary = "SELECT * FROM product_table";  

        $conn =  mysqli_connect("localhost","root" ,"","ecommercedb");
        if($conn){
            
        }else{
           
        }

        $result = mysqli_query($conn,$quary);
     
       if(mysqli_num_rows($result) > 0){
         
         $row = array();
         while($i = mysqli_fetch_assoc($result)){
            $row['result'][] = $i;
         }
         
         return response()->json($row);


       }else{
         return '{"result": "Not found"}';
       }



       
        //echo $result;
       // echo "<pre>";
       // print_r($result);
       // echo "</pre>";
       // return Redirect::to('/all-slider');

     }
}
