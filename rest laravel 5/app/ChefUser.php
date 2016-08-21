<?php namespace App;

class ChefUser extends Model {

	protected $table = 'users';

	protected $fillable = array('first_name', 'last_name', 'login_name','email','password','code','active','remember_token');

	public static $rules = array(
			'first_name'=>'required|min:2|alpha',
			'last_name'=>'required|min:2|alpha',
			'login_name'=>'required|min:4|alpha|unique:users',
			'email'=>'required|email|min:2|unique:users',
			'password'=>'required|min:6',
			'confirm_password'=>'required|min:6|same:password'
		);

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}