<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();

class BrandController extends Controller
{
    public function index(){
      $this->AdminAuthnication();
     return view('Admin.add_brand');
    }

    public function save_brand(Request $request){
        $this->AdminAuthnication();

    	$data = array();
    	
    	$data['menufacture_id']=$request->brand_id;
    	$data['menufacture_name']=$request->brand_name;
    	$data['menufacture_description']=$request->brand_description;
    	$data['publication_status']=$request->publication_status;


    	DB::table('manufacture_table')->insert($data);
    	Session::put('message','Category Added Successfully !!');

    	return Redirect::to('/add-brand');
     
     //return view('Admin.add_brand');
    }

    public function all_brand(){
     $this->AdminAuthnication();
     $allproduct_info = DB::table('manufacture_table')->get();
    	$manage_product = view('Admin.all_brand')
    	->with('allproduct_info',$allproduct_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.all_brand',$manage_product);
     //return view('all_brand');
    }

    public function unactive_brand($brand_id){
         
         DB::table('manufacture_table')
            ->where('menufacture_id',$brand_id)
            ->update(['publication_status' => 0]);
         Session::put('message','Category Unactive Successfully !!');
             return Redirect::to('/all-brand');
    }


    public function active_brand($brand_id){
         
         DB::table('manufacture_table')
            ->where('menufacture_id',$brand_id)
            ->update(['publication_status' => 1]);
         Session::put('message','Category active Successfully !!');
             return Redirect::to('/all-brand');
    }

    public function edit_brand($brand_id){
       $this->AdminAuthnication();
       $edit_brand_info = DB::table('manufacture_table')
          ->where('menufacture_id',$brand_id)
          ->first();

    	$manage_edit_category = view('Admin.edit_brand')
    	->with('edit_brand_info',$edit_brand_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.edit_brand',$manage_edit_category);

      //return view('Admin.edit_category');
    }

    public function update_brand(Request $request, $brand_id)
   {
        $data =array();

        $this->AdminAuthnication();
       
    	$data['menufacture_name']=$request->brand_name;
    	$data['menufacture_description']=$request->brand_description;
    	


    	DB::table('manufacture_table')
           ->where('menufacture_id',$brand_id)
    	   ->update($data);
    	Session::put('message','Category Update Successfully !!');

    	return Redirect::to('/all-brand');


   }

   public function delete_brand($brand_id)
   {
       $this->AdminAuthnication();
    	
    	DB::table('manufacture_table')
           ->where('menufacture_id',$brand_id)
    	   ->delete();
    	Session::put('message','Brand Delete Successfully !!');

    	return Redirect::to('/all-brand');


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
