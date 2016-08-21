<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('', array('as' => 'main', 'uses'=>'RestaurantC@get_aindex'));
// create the group

// Authenticated route group

Route::group(['middleware' => 'auth'], function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf'), function(){
			Route::post('edit_save', ['uses'=>'UserEdit@post_saveEdit']);
	});
	Route::group(array('after'=>'no-cache'),function(){
		Route::get('logout', ['as' => 'logout', 'uses' => 'RestaurantC@get_logout']);
		Route::get('edit', ['as'=>'edit', 'uses'=>'UserEdit@get_edit']);
		
	});
});

// Unauthenticated users
Route::group(['middleware' =>'guest'], function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf'), function(){
		Route::post('register2', array('before'=>'csrf','uses'=>'RegisterUser@post_register2'));
		Route::post('login2', array('before'=>'csrf','uses'=>'RestaurantC@post_login'));
	});
	Route::group(array('after'=>'no-cache'),function(){
		Route::post('register2', array('before'=>'csrf','uses'=>'RegisterUser@post_register2'));
		Route::post('login2', array('before'=>'csrf','uses'=>'RestaurantC@post_login'));
	});
	//create account
	Route::get('user_register', array('as'=>'register','uses'=>'RegisterUser@get_register'));
	Route::get('search_results', array('uses'=>'RestaurantC@get_search'));
	Route::get('login', array('uses'=>'RestaurantC@get_login'));
	Route::get('activate/{code}',array('as'=>'user-activate', 'uses'=>'RegisterUser@get_activate'));	
});

// Owner authenticated route group

Route::group(['middleware' => 'auth'], function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf'), function(){
//		Route::post('register_chef2', array('as' => 'reg_chef2', 'uses' => 'OwnersController@post_registerChef2'));
//			Route::post('edit_save', array('uses'=>'UserEdit@post_saveEdit'));

	});
	Route::group(array('after'=>'no-cache'),function(){
	
//		Route::get('edit', array('as'=>'edit', 'uses'=>'UserEdit@get_edit'));
	Route::post('register_chef2', array('as' => 'reg_chef2', 'uses' => 'OwnersController@post_registerChef2'));
	Route::get('register_chef', array('as'=>'reg_chef','uses'=>'OwnersController@get_registerChef'));
	Route::get('owner_home', array('as'=>'owners_home','uses' =>'OwnersController@get_ownerhome'));
	});
});

// Chef authenticated route group

Route::group(array('middleware' => 'auth'), function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf'), function(){
		
//			Route::post('edit_save', array('uses'=>'UserEdit@post_saveEdit'));

	});
	Route::group(array('after'=>'no-cache'),function(){
		Route::get('chef', array('middleware' => 'test','as' => 'Chef_main', 'uses'=>'ChefController@get_mainChef'));
		Route::get('table_orders', array('as' => 'table_ordrs', 'uses'=>'ChefController@get_tableOrders'));
		Route::get('chef_menu',array('as'=>'chef_menu','uses'=>'ChefController@get_chefMenu'));
//		Route::get('edit', array('as'=>'edit', 'uses'=>'UserEdit@get_edit'));
	});
//	Route::get('register_chef', array('as'=>'reg_chef','uses'=>'OwnersController@get_registerChef'));
//	Route::get('owner_home', array('as'=>'owners_home','uses' =>'OwnersController@get_ownerhome'));
});
Route::filter('no-cache',function($route, $request, $response){

    $response->header("Cache-Control","no-cache,no-store, must-revalidate");
    $response->header("Pragma", "no-cache"); //HTTP 1.0
    $response->header("Expires"," Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

});
/*
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
*/