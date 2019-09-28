<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();

class CategoryControler extends Controller
{



    public function index(){
      //$this->AdminAuthnication();
    	return view('Admin.add_category');
    }





    public function all_category(){


     // $this->AdminAuthnication();

    	$allcategory_info = DB::table('category_table')->get();
    	$manage_category = view('Admin.all_category')
    	->with('all_category',$allcategory_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.all_category',$manage_category);
    }





    public function save_category(Request $request){
    	
    // $this->AdminAuthnication();

    	$data = array();
    	
    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;


    	DB::table('category_table')->insert($data);
    	Session::put('message','Category Added Successfully !!');

    	return Redirect::to('/add-category');
    }





    public function unactive_category($category_id){
         
         DB::table('category_table')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 0]);
         Session::put('message','Category Unactive Successfully !!');
             return Redirect::to('/all-category');
    }


    public function active_category($category_id){
         
         DB::table('category_table')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 1]);
         Session::put('message','Category active Successfully !!');
             return Redirect::to('/all-category');
    }


    public function edit_category($category_id){
      // $this->AdminAuthnication();
       $edit_category_info = DB::table('category_table')
          ->where('category_id',$category_id)
          ->first();

    	$manage_edit_category = view('Admin.edit_category')
    	->with('update_category',$edit_category_info);
    	return view('Admin.admin_dashbord') 
    	    ->with('Admin.edit_category',$manage_edit_category);

      //return view('Admin.edit_category');
    }

public function update_category(Request $request, $category_id)
{    
    //$this->AdminAuthnication();
     $data =array();


       
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	


    	DB::table('category_table')
           ->where('category_id',$category_id)
    	   ->update($data);
    	Session::put('message','Category Update Successfully !!');

    	return Redirect::to('/all-category');


}

public function delete_category($category_id)
{
      //$this->AdminAuthnication();
    	
    	DB::table('category_table')
           ->where('category_id',$category_id)
    	     ->delete();
    	Session::put('message','Category Delete Successfully !!');

    	return Redirect::to('/all-category');


}


public function AdminAuthnication(){
     //  $this->AdminAuthnication();
      $admin_id = Session::get('admin_id');

      if($admin_id){
        return;
      }else{
         return Redirect::to('/admin')->send();
      }
    }















}











