<?php

class RestaurantC extends BaseController{

	public $restful = true;
//amgular index
	public function get_aindex(){

	//	$as = DB::table('recype_symbols')->where('symbol_id',8)->get();
		//$as = DB::table('recype_symbols')
		//		->join(DB::raw('(select *  from recype_symbols where symbol_id = 16 or symbol_id = 8) as b'),'recype_symbols.recipe_id','=','b.recipe_id')
		//	    	->where('recype_symbols.symbol_id',8)
		//	    	->where('b.symbol_id',16)
		//	    	->get();
//$as = date('Y-m-d');
//dd($as);

		return View::make('angularz.index');
			//	->with('as', $as);
	} 

	public function get_index(){
		/*		Mail::send('emails.auth.test', array('name' => 'ER'), function($message)
		 {
				$message->to('as1nektars@gmail.com', 'Go home')->subject('test email');
		});
		*/
		$title = "Main";
		return View::make('plugins.main')
		->with('title', $title)
		->with('main', Ruser::all());
	} 

	public function get_login(){
		$title = "Login";
		return View::make('user.login')
		->with('title', $title);
	}

	public function get_logout(){
		if(Auth::user()){
			Auth::logout();
		
		//	Session::flush();
		//	Session::forget(Auth::user());
			return Redirect::to('')
				->with('namek', 'You have been loged off successfully.');
		}else{
			return Redirect::to('main');
		}

	}

	public function get_main(){
		$title = "Main";
		return View::make('plugins.main')
		->with('title', $title);
	}

	public function post_login(){

		try{
			if($_POST){
				$title = "Login resp";
				$validation = Ruser::validatel(Input::all());

				if($validation->fails()){
					return Redirect::to('login')
					->withErrors($validation);
				}else{
					try{
					$count = DB::table('users')->where('login_name', Input::get('login_name'))->first()->failed_attempts;
					}catch(Exception $e){
						return Redirect::to('login')
						->with('namek', 'Login/password is wrong!!!');
					}
					if($count<3){
					$auth = Auth::attempt(array(
							'login_name' => Input::get('login_name'),
							'password' => Input::get('password'),
							'active' => 1
						));
					}else{
						return Redirect::to('login')
						->with('namek', 'Your account is suspended for two hours!!!');
					}
					if($auth){
						$type = UserTypes::where('user_id','=',Auth::user()->id)->first()->type;
						if($type == 'chef'){
					
							return Redirect::to('chef');
							
						}else{
							return Redirect::to('');
						}
						

					}
					else{
						$count = DB::table('users')->where('login_name', Input::get('login_name'))->first()->failed_attempts;
						$acount = $count +1;
						DB::beginTransaction();
						try{
							DB::update('update users set failed_attempts = '.$acount.' where login_name = ?', array(Input::get('login_name')));
						}catch(Exception $e){
							DB::rollback();
						}
						DB::commit();
						return Redirect::to('login')
						->with('namek', 'Login/password is wrong or account is not activated or suspended!!!');
					}
				
				}
			}else{
				return Redirect::to('login');
			}
		}catch(Exception $e){
				return Redirect::to('login')
						->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function get_search(){
		$validation = Ruser::validateloc(Input::all());

		try{
		if($validation->fails()){
			return Redirect::to('')
			->withErrors($validation);
		}
		else{
			$title = "Search results";
			$offer ="";
			$res2 =null;
			$loc = Input::get('location');
			$res = DB::table("restaurants")->where('city', 'LIKE', '%'.$loc.'%')->get();
			if(!$res){
				$offer = "No mach were found, but here is some other options !!!";
			}
			if(Input::get('location') !=""){
				$res2 = DB::table("restaurants")->where('city','NOT LIKE', '%'.$loc.'%')->get();
				dd($res2);
			}
			$view = View::make('restaurant.search_results')
			->with('title', $title)
			->with('offer', $offer);
			$view['location'] = Input::get('location');
			$view['res'] = $res;
			$view['res2'] = $res2;
			return $view;
		}
		}catch(Exception $ex){
				return Redirect::to('')
					->with('namek', 'Unexpected error. Please try again');
		}

	}


	public function get_profile(){
		$validation = Restaurant::validate1(Input::all());
	//	try{
			if($validation->fails()){
				return Redirect::to('')
				->withErrors($validation);
			}
			else{
				$rest= Input::get('restaurant_id');
				$categories = null;
				$items = null;
				$picture = null;
			try{
				$picture = Restaurant::where('restaurant_id','=',$rest)->first();
				}catch(Exception $e){
					$picture = null;
				}
				try{
				$categories = MenuCategory::where('restaurant_id','=',$rest)->get();
				}catch(Exception $e){
					$categories = null;
				}
				try{
				$items = DB::table('menu_category')
					->join('restaurant_menu_category_items', function($join){
					$join->on('menu_category.category_id','=','restaurant_menu_category_items.category_id')
					->where('restaurant_id','=',Input::get('restaurant_id'));
				})->get();
				}catch(Exception $e){
					$items = null;
				}
				$title = 'restaurant profile';
			//	$data[0] = View::make('restaurant.menu')
			//						->with('title', $title)
			//						->with('categories', $categories)
			//						->with('items', $items);
				$view = View::make('restaurant.restaurant_profile')
					->with('title', $title)
					->with('id', $rest);
			//		->with('test', $data);
				$view['menu'] = 'hi there agau=in';
				$view['restaurant'] = $picture;
				$view['categories']=$categories;
				$view['items']= $items;
				return $view;
			}
	//	}catch(Exception $ex){
	//	return Redirect::to('')
	//		->with('namek', 'Unexpected error. Please try again');
	//	}
	}

	public function get_reset(){
		$title='Reset';
		return View::make('user.request_password')
			->with('title', $title);
	}

	public function post_reset2(){
		$validation = Ruser::validate_email(Input::all());
		DB::beginTransaction();
		if($validation->fails()){
			return Redirect::to('reset')
			->withErrors($validation);
		}
		else{
			try{
				$code = str_random(60);
				$email = Input::get('email');
				$ak = DB::table('users')->where('email','=', $email)->first();
				try{
					$edi = Ruser::find($ak->id)->update(array('code' => $code));
				}catch(Exception $e){
					DB::rollback();
				}
				DB::commit();
				$data = array('email'=>$email, 'code'=>$code);
				Mail::send('emails.auth.password_reset', array('link' => URL::route('reset3-password', $code), 'code'=>$code), function($message) use ($email) {
					$message->to($email)->subject('Password reser');
				});
				$title='Reset';
				return Redirect::to('login')
					->with('namek', 'Password replacement emails were sent');
			}catch(Exception $ex){
				DB::rollback();
				return Redirect::to('reset')
					->with('namek', 'Invalid data');
			}
		}
	}

	public function get_reset_form(){
		$validation = Ruser::validate_reset(Input::all());
		DB::beginTransaction();
		if($validation->fails()){
			return Redirect::to('reset')
			->withErrors($validation);
		}
		else{
			try{
				$code = Input::get('code');
				$login = Input::get('login_name');
				$password = Hash::make(Input::get('password'));
				$ak = DB::table('users')->where('login_name','=', $login)
										->where('code','=', $code)->first();
				try{
					$edi = Ruser::find($ak->id)->first();
					if($edi){
						if($edi->failed_attempts<3){
						$edi->code='';
						$edi->password = Hash::make(Input::get('password'));
						if($edi->save()){
							DB::commit();
						return Redirect::to('login')
							->with('namek', 'Password was reset successfully');
						}}else{
							return Redirect::to('login')
							->with('namek', 'Your account is suspended for two hours');
						}

					}else{
						DB::rollback();
						return Redirect::to('login')
							->with('namek', 'Input details were incorrect.');
					}
				}catch(Exception $e){
					DB::rollback();
					return Redirect::to('login')
							->with('namek', 'Input details were incorrect.');
				}
				DB::commit();
			}catch(Exception $ex){
				DB::rollback();
				return Redirect::to('reset')
					->with('namek', 'Invalid data');
			}
		}
	}

	public function get_reset1($code){
			
			$title = 'reset';
			return View::make('user.reset_password')
				->with('title', $title)
				->with('code', $code);

	}

	public function post_reset_password(){
		$validation = Ruser::validate_reset(Input::all());
		DB::beginTransaction();
		if($validation->fails()){
			return Redirect::to('reset3-password')
			->withErrors($validation);
		}
		else{
			try{
				$code = Input::get('code');
				$login = Input::get('login_name');
				$password = Hash::make(Input::get('password'));
				$ak = DB::table('users')->where('login_name','=', $login)
										->where('code','=', $code)->first();
				try{
					$edi = Ruser::find($ak->id)->first();
					if($edi){
						if($edi->failed_attempts<3){
						$edi->code='';
						$edi->password = Hash::make(Input::get('password'));
						if($edi->save()){
							DB::commit();
						return Redirect::to('login')
							->with('namek', 'Password was reset successfully');
						}}else{
							return Redirect::to('login')
							->with('namek', 'Your account is suspended for two hours');
						}

					}else{
						DB::rollback();
						return Redirect::to('reset3')
							->with('namek', 'Input details were incorrect.');
					}
				}catch(Exception $e){
					DB::rollback();
					return Redirect::to('login')
							->with('namek', 'Input details were incorrect.');
				}
				DB::commit();
			}catch(Exception $ex){
				DB::rollback();
				return Redirect::to('reset')
					->with('namek', 'Invalid data');
			}
		}
	}

}