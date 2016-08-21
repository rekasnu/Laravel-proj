<?php

class MenuCategory extends Eloquent {

	protected $table = 'menu_category';

	protected $fillable = array('restaurant_id', 'category');

	public static $rules = array(
			'category'=>'required|min:2|regex:/(^[A-Za-z0-9 ]+$)+/',
		);
	public static $rules1 = array(
			'category'=>'required|min:2|regex:/(^[A-Za-z0-9 ]+$)+/|exists:menu_category',
		);
	//'pricing_value' => 'regex:/^\d*(\.\d{2})?$/'
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
	public static function validate1($data){
		return Validator::make($data, static::$rules1);
	}
	public function restaurant_menu_category_item(){
		return $this->hasMany('restaurant_menu_category_items');
	}

}