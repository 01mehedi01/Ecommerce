<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');
   // return view('layout_contain.home_content');
//});

//Auth::routes();
//******************************************FrontEnd  route ********************************************
Route::get('/product-category/{category_id}','HomeController@product_by_category');
Route::get('/product-menufecture/{menufacture_id}','HomeController@product_by_brand');
Route::get('/view-product/{product_id}','HomeController@view_details_by_id');





//Cart   route ********************************************


Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/add-to-carts','CartController@add_to_carts');
Route::get('/delect-cart/{rowId}','CartController@delect_cart');
Route::post('/update-cart','CartController@update_cart');


//*********************************************Check out *****************************************
Route::get('/login-user','CheckController@login_user');
Route::post('/user-registration','CheckController@user_registration');
Route::post('/user-login','CheckController@user_login');
Route::get('/checkout','CheckController@checkout');
Route::post('/save-shidetails','CheckController@save_shiping_details');

Route::get('/user-logout','CheckController@user_logout');
Route::get('/user-loginhome','CheckController@user_loginhome');


//*********************************************Check out *****************************************

Route::get('/payment','CheckController@payment');
Route::post('/order-place','PaymentController@order_place');

Route::get('/manage-order','PaymentController@order_manage');





 //*********************************************backend  route ********************************************


Route::get('/admin','AdminControler@index');
Route::get('/logout','AdminProtectControler@logout');
Route::get('/dashbor','AdminProtectControler@dashbord_view');
Route::post('/login-succ','AdminControler@vearify_login');


//******************************************* Add Category Route  **************************
Route::get('/add-category','CategoryControler@index');
Route::get('/all-category','CategoryControler@all_category');

Route::post('/save-category','CategoryControler@save_category');
Route::post('/update-category/{category_id}','CategoryControler@update_category');

Route::get('/unactive-category/{category_id}','CategoryControler@unactive_category');
Route::get('/active-category/{category_id}','CategoryControler@active_category');

Route::get('/edit-category/{category_id}','CategoryControler@edit_category');
Route::get('/delete-category/{category_id}','CategoryControler@delete_category');



//************************************************ Brand Route  **************************

Route::get('/add-brand','BrandController@index');
Route::get('/all-brand','BrandController@all_brand');
Route::post('/save-brand','BrandController@save_brand');

Route::get('/unactive-brand/{brand_id}','BrandController@unactive_brand');
Route::get('/active-brand/{brandy_id}','BrandController@active_brand');

Route::get('/edit-brand/{brand_id}','BrandController@edit_brand');
Route::get('/delete-brand/{brand_id}','BrandController@delete_brand');


Route::post('/update-brand/{brand_id}','BrandController@update_brand');



//***********************************************Product Route ************************

Route::get('/add-product','ProductController@add_product');

Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::post('/update-product/{product_id}','ProductController@update_product');


//******************************************Slider Route ************************

Route::get('/add-slider','sliderController@add_slider');
Route::get('/all-slider','sliderController@all_slider');
Route::post('/save-slider','sliderController@save_slider');


//******************************************Slider Route ************************