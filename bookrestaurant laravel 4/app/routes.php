<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::get('', array('as' => 'main', 'uses'=>'RestaurantC@get_aindex'));
Route::get('', array('as' => 'main', 'uses'=>'RestaurantC@get_index'));
// create the group

// Authenticated route group

Route::group(array('before' => 'auth'), function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf', 'after'=>'no-cache'), function(){
		Route::post('edit_save', array('before'=>'csrf','uses'=>'UserEdit@post_saveEdit'));
		
	});
	Route::group(array('after'=>'no-cache'),function(){
		Route::get('logout', array('as' => 'logout', 'uses' => 'RestaurantC@get_logout'));
		Route::get('edit', array('as'=>'edit', 'uses'=>'UserEdit@get_edit'));
		
	});
});

// Unauthenticated users
Route::group(array('before' =>'gest'), function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf'), function(){
		Route::post('register2', array('before'=>'csrf','uses'=>'RegisterUser@post_register2'));
		Route::post('login2', array('before'=>'csrf','uses'=>'RestaurantC@post_login'));
		Route::post('reset2', array('before'=>'csrf','uses'=>'RestaurantC@post_reset2'));
		Route::post('reset3/{code}', array('as'=>'reset3-password', 'uses'=>'RestaurantC@get_reset_form'));
		Route::post('restaurant_profile', array('as'=>'rest_profile','uses'=>'RestaurantC@get_profile'));
		Route::post('reset4', array('as'=>'reset4', 'uses'=>'RestaurantC@post_reset_password'));
		Route::post('make_order', array('as'=>'make_order', 'uses'=>'MakeOrder@make_order'));

	});
	//create account
	Route::get('user_register', array('as'=>'register','uses'=>'RegisterUser@get_register'));
	Route::get('search_results', array('uses'=>'RestaurantC@get_search'));
	Route::get('login', array('uses'=>'RestaurantC@get_login'));
	Route::get('activate/{code}',array('as'=>'user-activate', 'uses'=>'RegisterUser@get_activate'));	
	Route::get('reset', array('as'=>'reset', 'uses'=>'RestaurantC@get_reset'));
	Route::get('reset3/{code}', array('as'=>'reset3-password', 'uses'=>'RestaurantC@get_reset1'));
});

// Owner authenticated route group

Route::group(array('before' => 'auth'), function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf', 'after'=>'no-cache'), function(){
		Route::post('register_chef2', array('as' => 'reg_chef2', 'uses' => 'OwnersController@post_registerChef2'));
		Route::post('save_rest_profile', array('as' => 'save_rest_profile', 'uses' => 'OwnersController@post_saveProfile'));
//			Route::post('edit_save', array('uses'=>'UserEdit@post_saveEdit'));
		Route::post('make_order_st1', array('as'=>'step1','uses'=>'MakeOrder@make_order_st1'));
	});
	Route::group(array('after'=>'no-cache'),function(){
	
//		Route::get('edit', array('as'=>'edit', 'uses'=>'UserEdit@get_edit'));
	
	Route::get('create_rest_profile', array('as'=>'create_rest_profile','uses'=>'OwnersController@get_createRestProfile'));
	Route::get('register_chef', array('as'=>'reg_chef','uses'=>'OwnersController@get_registerChef'));
	Route::get('owner_home', array('as'=>'owners_home','uses' =>'OwnersController@get_ownerhome'));
	});
});

// Chef authenticated route group

Route::group(array('before' => 'auth'), function(){
	//CSRF crossite forgery protection
	Route::group(array('before' => 'csrf', 'after'=>'no-cache'), function(){
		Route::post('tab_save',array('as'=>'tab_save','uses'=>'ChefController@post_save'));
		Route::post('save_dish',array('as'=>'save_dish','uses'=>'ChefController@post_save_dish'));
		Route::post('remove_tab',array('as'=>'remove_tab','uses'=>'ChefController@post_removeTab'));
//			Route::post('edit_save', array('uses'=>'UserEdit@post_saveEdit'));

	});
	Route::group(array('before'=>'csrf1', 'after'=>'no-catch'), function(){
		Route::post('remove', array('as'=>'remove', 'uses'=>'ChefController@post_removeDish'));
	});
	Route::group(array('after'=>'no-cache'),function(){
		Route::get('chef', array('as' => 'Chef_main', 'uses'=>'ChefController@get_mainChef'));
		Route::get('table_orders', array('as' => 'table_ordrs', 'uses'=>'ChefController@get_tableOrders'));
		Route::get('chef_menu',array('as'=>'chef_menu','uses'=>'ChefController@get_chefMenu'));
	//	Route::post('remove_tab',array('as'=>'remove_tab','uses'=>'ChefController@post_remove_tab'));
//		Route::get('edit', array('as'=>'edit', 'uses'=>'UserEdit@get_edit'));

	});
//	Route::get('register_chef', array('as'=>'reg_chef','uses'=>'OwnersController@get_registerChef'));
//	Route::get('owner_home', array('as'=>'owners_home','uses' =>'OwnersController@get_ownerhome'));
});



/*Route::post('register2', function(){
		
		$rules = array(
			'f_name'=>'required|min:2',
			'l_name'=>'require|min:2',
			'd_name'=>'require|min:2',
			'email'=>'require|min:2',
			'password'=>'require|min:2',
			'password_confirmation'=>'require|same:password'
		);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
//			$messages = $validator->messages();
			return Redirect::to_route('register');
		//		->withErrors($validator);
//				->withInput(Input::except('password','password_confirmation'));
		}
		else{
			$title = "Register response";
		$ruser = new Ruser;
	//	$user = User::create(array(

		$ruser->f_name = Input::get('f_name');
		$ruser->l_name = Input::get('l_name');
		$ruser->d_name = Input::get('d_name');
		$ruser->email = Input::get('email');
		$ruser->password = Input::get('password');

	//		));
		$ruser->save();
		$view = View::make('register2')
	//	$view = View::make('user.register2')
			->with('title', $title);
		$view['f_name'] = Input::get('f_name');
		$view['l_name'] = Input::get('l_name');
		$view['d_name'] = Input::get('d_name');
		$view['email'] = Input::get('email');
	
		return $view;
		}
});
*/
//Route::get('register', array('uses'=>'UserController@get_create'));

/*
Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/', function()
{
	$title = "Main";
	return View::make('restaurant.main')
		->with('title', $title);
});
Route::get('login', function()
{
	$title = "Login";
	return View::make('user.login')
		->with('title', $title);
});
Route::get('register', function()
{
	$title = "Register";
	return View::make('user.register')
		->with('title', $title);
});
