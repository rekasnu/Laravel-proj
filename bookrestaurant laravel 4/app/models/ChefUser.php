<?php

class ChefUser extends Eloquent {

	protected $table = 'users';

	protected $fillable = array('first_name', 'last_name', 'login_name','contact_telephone_number','email','password','code','active','failed_attempts','remember_token');

	public static $rules = array(
			'rest_name'=>'required|regex:/^[\pL\s]+$/u|exists:restaurants',
			'first_name'=>'required|min:2|alpha',
			'last_name'=>'required|min:2|alpha',
			'login_name'=>'required|min:4|regex:/(^[A-Za-z0-9 ]+$)+/|unique:users',
			'telephone_noo' =>'required|max:999999999999|numeric',
			'email'=>'required|email|min:2|unique:users',
			'password'=>'required|min:6',
			'confirm_password'=>'required|min:6|same:password'
		);

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}