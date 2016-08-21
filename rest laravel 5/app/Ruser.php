<?php namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Ruser extends Model {

	protected $table = 'users';

	protected $fillable = array('first_name', 'last_name', 'login_name','email','password','code','active','remember_token');

	public static $rules = array(
			'first_name'=>'required|min:2|alpha',
			'last_name'=>'required|min:2|alpha',
			'login_name'=>'required|min:4|alpha|unique:users',
			'email'=>'required|email|min:2|unique:users',
			'user'=>'required',
			'password'=>'required|min:6',
			'password_confirmation'=>'required|min:6|same:password',
			'terms_and_conditions_I_Agre' =>'required|min:1'
		);

	public static $rules1 = array(
			'login_name'=>'required|min:4|alpha',
			'password'=>'required|min:6'
		);
	public static $rules2 = array(
		'location'=>'required|alpha'
	);
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public static function validatel($data){
		return Validator::make($data, static::$rules1);
	}

	public static function validateloc($data){
		return Validator::make($data, static::$rules2);
	}

}

