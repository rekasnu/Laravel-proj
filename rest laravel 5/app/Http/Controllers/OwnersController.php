<?php namespace App\Http\Controllers;
use View;
class OwnersController extends Controller{

	public function get_ownerhome(){
		$title = 'Owners Home';

		return View::make('owner.owner_home')
			->with('title', $title);
	}

	public function get_registerChef(){
		$title = 'Register Chef';

		return View::make('owner.reg_chef')
			->with('title', $title);
	}

	public function post_registerChef2(){
		$title = 'Register Chef';
		//$input = Input::all();
		//$input = serialize($input);
		$validation = ChefUser::validate(Input::all());
		if($validation->fails()){
			return Redirect::to('register_chef')
				->withErrors($validation)
				->with('chef',(object)Input::except('password','password_confirmation'));
			//	->with('chef',$input);
		}else{
			$ruser = new Ruser;

			$ruser->first_name = Input::get('first_name');
			$ruser->last_name = Input::get('last_name');
			$ruser->login_name = Input::get('login_name');
			$ruser->email = Input::get('email');
			$ruser->password = Hash::make(Input::get('password'));
			$ruser->code = str_random(60);
			$ruser->active = 1;
			$ruser->save();

			$type = new UserTypes;
			$type->user_id = Ruser::where('email','=',Input::get('email'))->first()->id;
			$type->type = 'chef';
			$type->save();

			$view = View::make('user.register2')
				->with('title', $title)
				->with('msg', 'Chefs account were created');
			$view['f_name'] = Input::get('first_name');
			$view['l_name'] = Input::get('last_name');
			$view['d_name'] = Input::get('login_name');
			$view['email'] = Input::get('email');
			$view['user'] = 'chef';

			return $view;
		}
	}
}