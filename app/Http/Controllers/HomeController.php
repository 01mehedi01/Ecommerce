<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\increments;

session_start();

class HomeController extends Controller
{
   
    public function index()
    {
        $all_publish_product_info = DB::table('product_table')
                             ->join('category_table','product_table.category_id','=','category_table.category_id')
                             ->join('manufacture_table','product_table.menufacture_id','=','manufacture_table.menufacture_id')
                             ->select('product_table.*','category_table.category_name','manufacture_table.menufacture_name')
                             ->get();



    	$manage_publish_product = view('layout_contain.home_content')
    	->with('all_publish_product_info',$all_publish_product_info);
    	return view('welcome') 
    	    ->with('layout_contain.home_content',$manage_publish_product);

        //return view('layout_contain.home_content');
    }

    public function product_by_category($category_id)
    {
        $all_product_by_category = DB::table('product_table')
                             ->join('category_table','product_table.category_id','=','category_table.category_id')
                           
                             ->select('product_table.*','category_table.category_name')
                             ->where('product_table.category_id',$category_id)
                             ->limit(18)
                             ->get();



    	$manage_product_by_category = view('layout_contain.product_by_category')
    	->with('all_product_by_category',$all_product_by_category);
    	return view('welcome') 
    	    ->with('layout_contain.product_by_category',$manage_product_by_category);

        //return view('layout_contain.home_content');
    }

    public function product_by_brand($menufacture_id)
    {
        $all_product_by_brand = DB::table('product_table')

                             ->join('category_table','product_table.category_id','=','category_table.category_id')
                             ->join('manufacture_table','product_table.menufacture_id','=','manufacture_table.menufacture_id')
                           
                             ->select('product_table.*','category_table.category_name','manufacture_table.menufacture_name')
                             ->where('product_table.menufacture_id',$menufacture_id)
                             ->limit(18)
                             ->get();



    	$manage_product_by_brand = view('layout_contain.product_by_brand')
    	->with('all_product_by_brand',$all_product_by_brand);
    	return view('welcome') 
    	    ->with('layout_contain.product_by_brand',$manage_product_by_brand);

        //return view('layout_contain.home_content');
    }

    public function view_details_by_id($product_id)
    {
        $view_details_by_id = DB::table('product_table')

                             ->join('category_table','product_table.category_id','=','category_table.category_id')
                             ->join('manufacture_table','product_table.menufacture_id','=','manufacture_table.menufacture_id')
                           
                             ->select('product_table.*','category_table.category_name','manufacture_table.menufacture_name')
                             ->where('product_table.product_id',$product_id)
                             ->limit(18)
                             ->first();



    	$manage_product_by_id = view('layout_contain.view_details')
    	->with('view_details_by_id',$view_details_by_id);
    	return view('welcome') 
    	    ->with('layout_contain.view_details',$manage_product_by_id);

        //return view('layout_contain.home_content');
    }
    
}
