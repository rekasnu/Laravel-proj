<?php namespace App\Http\Controllers;
use View;
	class UserController extends Controller(){

		public $restful = true;

		public function post_login(){

			$validation = Ruser::validatel(Input::all());

			if($validation->fails()){
			//	$messages = $validator->messages();
				return Redirect::to('login')
					->withErrors($validation)
					->withInput(Input::except('password'));
			}
			else{
			$input = Input::all();

			$rules = array('email'->'requird|email', 'password'->'required');

			$v = Validator::make($input, $rules);

			if($v->fails()){
				return Redirect::to('/')->withErrors($v);
			} else {
				$credentials = array('email' => $input['email'], 'password' => $input['password']);
				if(Auth::attempt($credentials)){
					return Redirect::to('/');
				} else {
					return Redirect::to('login');
				}
			}
		}



	}