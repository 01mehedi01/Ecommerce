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

class CartController extends Controller
{
    public function add_to_cart(Request $request){

    	$qty =$request->qty;
    	$product_id =$request->product_id;


          $product_info = DB::table('product_table')
               ->where('product_id',$product_id)
               ->first();
        
        $data['qty']=$qty;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['weight']=0;  
        $data['price']=$product_info->product_price;
        $data['options']['image']=$product_info->product_image;

        Cart::add($data);

         return Redirect::to('/show-cart');
        // view('layout_contain.add_to_cart');
    }
    public function add_to_carts(Request $request){

    	
         return Redirect::to('/show-cart');
        // view('layout_contain.add_to_cart');
    }

    public function show_cart(Request $request){

    	$allcategory_info = DB::table('category_table')
                           ->where('publication_status',1)
    	                   ->get();

    	$manage_category = view('layout_contain.add_to_cart')
    	->with('allcategory_info',$allcategory_info);
    	return view('welcome') 
    	    ->with('layout_contain.add_to_cart',$manage_category);
        // view('layout_contain.add_to_cart');
    }
    public function delect_cart($rowId){

          Cart::update($rowId,0);

         return Redirect::to('/show-cart');
        // view('layout_contain.add_to_cart');
    }

     public function update_cart(Request $request){
          
          $qty =$request->qty;
          $row_id =$request->rowId; 

          
          Cart::update($row_id,$qty);
          // echo $qty;
          // echo "<br>";
          // echo $row_id;
         return Redirect::to('/show-cart');
        // view('layout_contain.add_to_cart');
    }
}
