<?php

class RestaurantMenuItems extends Eloquent {

	protected $table = 'restaurant_menu_category_items';

	protected $fillable = array( 'category_id', 'dish_name', 'description', 'price');

	public static $rules = array(
			'dish_name' =>'required|min:5|max:100|regex:/^[a-z0-9 ]+[_.-]?[a-z0-9]+$/i',
			'description' =>'required|min:10|max:200|regex:/^[a-zA-Z0-9,.!? ]*$/',
			'price'=>'required|min:4|max:6|regex:/^\d{0,3}[.]\d{0,2}/i',
			'category'=>'required|min:2|regex:/(^[A-Za-z0-9 ]+$)+/',
		);
	public static $rules1 = array(
			'id' =>'exists:restaurant_menu_category_items',
		);
	//'pricing_value' => 'regex:/^\d*(\.\d{2})?$/'
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
	public static function validate1($data){
		return Validator::make($data, static::$rules1);
	}
	public function menu_category()
    {
        return $this->belongsTo('menu_category');
    }

}