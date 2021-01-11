<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'LoginController@register');
Route::post('login', 'LoginController@login');

Route::post('forget_pwd', 'LoginController@forget_pwd');
Route::get('reset_pwd/{token}', 'LoginController@reset_pwd');
Route::post('reset_pwd/{token}', 'LoginController@reset_pwd_post');

Route::group([
	'middleware' => 'jwt.verify'
], function(){
    Route::post('update_profile', 'ProfileController@update_profile');
    Route::post('change_password', 'ProfileController@change_password');
    
});

Route::post('contact_us', 'FrontController@contact_us');

Route::get('blog', 'FrontController@blog');
Route::get('latest_blog', 'FrontController@latest_blog');
Route::get('blog_details/{slug}', 'FrontController@blog_details');

Route::get('testimonial', 'FrontController@testimonial');

Route::post('site_language_list', 'SiteLanguageController@site_language_list');

Route::post('services_menu', 'ServicesController@services_menu');
Route::post('all_services', 'ServicesController@all_services');
Route::post('services/{slug}', 'ServicesController@services');
Route::post('service_details/{slug}', 'ServicesController@service_details');

Route::post('products_menu', 'ProductsController@products_menu');
Route::post('all_products', 'ProductsController@all_products');
Route::post('products/{slug}', 'ProductsController@products');
Route::post('product_details/{slug}', 'ProductsController@product_details');


include_once("mb_api.php");