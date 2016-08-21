<?php

class Ruser extends Eloquent {

	protected $table = 'users';

	protected $fillable = array('first_name', 'last_name', 'login_name','contact_telephone_number','email','password','code','failed_attempts','active','remember_token');

	public static $rules = array(
			'first_name'=>'required|min:2|alpha',
			'last_name'=>'required|min:2|alpha',
			'login_name'=>'required|min:4|regex:/(^[A-Za-z0-9 ]+$)+/|unique:users',
			'telephone_no' =>'required|max:999999999999|numeric',
			'email'=>'required|email|max:50|unique:users',
			'user'=>array('required','regex:/^owner|user|chef$/'),
			'password'=>'required|min:6|max:60',
			'password_confirmation'=>'required|min:6|same:password',
			'terms_and_conditions_I_Agre' =>'required|min:1'
		);

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public static $rules1 = array(
			'login_name'=>'required|min:4|regex:/(^[A-Za-z0-9 ]+$)+/',
			'password'=>'required|min:6'
		);

	public static function validatel($data){
		return Validator::make($data, static::$rules1);
	}


	public static $rules2 = array(
		'location'=>'regex:/(^[A-Za-z0-9 ]+$)+/'
	);

	public static function validateloc($data){
		return Validator::make($data, static::$rules2);
	}

	public static $rules3 = array(
		'email'=>'required|email|max:50'

	);

	public static function validate_email($data){
		return Validator::make($data, static::$rules3);
	}

	public static $rules4 = array(
		'login_name'=>'required|min:4|regex:/(^[A-Za-z0-9 ]+$)+/',
		'code'=>'required|regex:/(^[A-Za-z0-9]+$)+/',
		'password'=>'required|min:6|max:60',
		'password_confirmation'=>'required|min:6|same:password'
	);

	public static function validate_reset($data){
		return Validator::make($data, static::$rules4);
	}


}

