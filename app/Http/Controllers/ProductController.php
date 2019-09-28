<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();

class ProductController extends Controller
{

	public function add_product(){
       // $this->AdminAuthnication();
        return view('Admin.add_product');
	}
	
    public function save_product(Request $request){
     // $this->AdminAuthnication();
      $data = array();
    	
    	$data['product_id']=$request->prooduct_id;
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['menufacture_id']=$request->menufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_colour']=$request->product_colour;


    	$data['publication_status']=$request->publication_status;
        $image = $request->file('product_image');

        if($image){

        	$image_name =str_random(20);
        	$text = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$text;
        	$upload_path='image/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success){

        		$data['product_image']=$image_url;

        		DB::table('product_table')->insert($data);
    	            Session::put('message','Product Added Successfully !!');


                   return view('Admin.add_product');
        	}
        }

        $data['product_image']='';
    	  DB::table('product_table')->insert($data);
    	  Session::put('message','Product Added Successfully without image!!');


        return view('Admin.add_product');
	}


	public function all_product(){
        // $this->AdminAuthnication();
        $allproduct_info = DB::table('product_table')
                             ->join('category_table','product_table.category_id','=','category_table.category_id')
                             ->join('manufacture_table','product_table.menufacture_id','=','manufacture_table.menufacture_id')
                             ->select('product_table.*','category_table.category_name','manufacture_table.menufacture_name')
                             ->get();



    	$manage_product = view('Admin.all_product')
    	->with('all_products',$allproduct_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.all_product',$manage_product);
	}

	public function unactive_product($product_id){
         
         DB::table('product_table')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 0]);
         Session::put('message','Category Unactive Successfully !!');
             return Redirect::to('/all-product');
    }


    public function active_product($product_id){
         
         DB::table('product_table')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 1]);
         Session::put('message','Category active Successfully !!');
             return Redirect::to('/all-product');
    }


    public function edit_product($product_id){
       //$this->AdminAuthnication();
       $edit_product_info = DB::table('product_table')
          ->where('product_id',$product_id)
          ->first();

    	$manage_edit_product = view('Admin.edit_product')
    	->with('update_product',$edit_product_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.edit_product',$manage_edit_product);

      
    }

    public function update_product(Request $request, $product_id)
   {
    // $this->AdminAuthnication();
     $data =array();


       
    	
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['menufacture_id']=$request->menufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_colour']=$request->product_colour;
    	




       $image = $request->file('product_image');

        if($image){

        	$image_name =str_random(20);
        	$text = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$text;
        	$upload_path='image/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success){

        		$data['product_image']=$image_url;

        		DB::table('product_table')
        		            ->where('product_id',$product_id)
    	                    ->update($data);
    	            Session::put('message','Product update Successfully !!');


                   return view('Admin.add_product');
        	}
        }

        $data['product_image']='';
    	  DB::table('product_table')
    	                   ->where('product_id',$product_id)
    	                    ->update($data);
    	  Session::put('message','Product update Successfully without image!!');


    	

    	return Redirect::to('/all-product');


   }

   public function delete_product($product_id)
 {
   //  $this->AdminAuthnication();
    	
    	DB::table('product_table')
           ->where('product_id',$product_id)
    	     ->delete();
    	Session::put('message','Product Delete Successfully !!');

    	return Redirect::to('/all-product');


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
