<?php

class RestaurantC extends BaseController{

	public $restful = true;
//amgular index
	public function get_aindex(){
		return View::make('angularz.index');
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
					->with('namek', 'Login/password!!!');
				}
				if($count<3){
				$auth = Auth::attempt(array(
						'login_name' => Input::get('login_name'),
						'password' => Input::get('password'),
						'active' => 1
					));
				}else{
					return Redirect::to('login')
					->with('namek', 'Your account is suspended!!!');
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
					DB::update('update users set failed_attempts = '.$acount.' where login_name = ?', array(Input::get('login_name')));
					return Redirect::to('login')
					->with('namek', 'Login/password is wrong or account is not activated or suspended!!!');
				}
			
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function get_search(){
		$validation = Ruser::validateloc(Input::all());

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
			}
			$view = View::make('restaurant.search_results')
			->with('title', $title)
			->with('offer', $offer);
			$view['location'] = Input::get('location');
			$view['res'] = $res;
			$view['res2'] = $res2;
			return $view;
		}

	}

	public function get_profile(){
		$title = 'restaurant profile';
		return View::make('restaurant.restaurant_profile')
			->with('title', $title);
	}

}