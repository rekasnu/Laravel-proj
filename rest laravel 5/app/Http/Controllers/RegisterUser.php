<?php namespace App\Http\Controllers;
use View;
use Validate;
use Redirect;
use App\Ruser;
use Input;
use App\UserTypes;
use Mail;
use Hash;
use URL;
class RegisterUser extends Controller{

	public function get_register(){
		$title = "Register";
		return View::make('user.register')
		->with('title', $title);
	}

	public function post_register2(){

		$validation = Ruser::validate(Input::all());
		if($validation->fails()){
			return Redirect::to('user_register')
			->withErrors($validation)
			->withInput(Input::except('password','password_confirmation'));
		}
		else{

			$title = "Register response";
			$ruser = new Ruser;

			$ruser->first_name = Input::get('first_name');
			$ruser->last_name = Input::get('last_name');
			$ruser->login_name = Input::get('login_name');
			$ruser->email = Input::get('email');
			$ruser->password = Hash::make(Input::get('password'));
			$ruser->code = str_random(60);
			$ruser->active = 0;
				
			$ruser->save();

			$type = new UserTypes;
			$type->user_id = Ruser::where('email','=',Input::get('email'))->first()->id;
			$type->type = Input::get('user');
			$type->save();

			Mail::send('emails1.auth.activate', array('link' => URL::route('user-activate', $ruser->code),'name' => $ruser->first_name,'login' => $ruser->login_name), function($message) use ($ruser) {
				$message->to($ruser->email, $ruser->first_name)->subject('Activate your account');
			});


			$view = View::make('user.register2')
				->with('title', $title)
				->with('msg', 'We have sent you an email to activate your account');
			$view['f_name'] = Input::get('first_name');
			$view['l_name'] = Input::get('last_name');
			$view['d_name'] = Input::get('login_name');
			$view['email'] = Input::get('email');
			$view['user'] = Input::get('user');

			return $view;
		}
	}

	public function get_activate($code){
		$ruser = Ruser::where('code','=',$code)->where('active','=',0);
		if($ruser->count()){
				$ruser = $ruser->first();
				echo'<pre>',print_r($ruser), '</pre><br>';
				$ruser->active = 1;
				$ruser->code = '';

				if($ruser->save()){
					return Redirect::to('login')
						->with('namek',' your account is activated ! You can sign in.')
						->with('uname', $ruser->first_name);
				}	
		}
		else{
		return Redirect::to('login')
					->with('namek','We could not activate your account or it is active already');
				}
	}
}