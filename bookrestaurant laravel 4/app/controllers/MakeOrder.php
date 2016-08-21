<?php

class MakeOrder extends BaseController{

	public function make_order(){
		$validation = Restaurant::validate1(Input::all());
		if($validation->fails()){
			return Redirect::to('restaurant_profile')
			->withErrors($validation);
		}else{
			if(Auth::check()){
			if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type != 'chef'){
				$rest= Input::get('restaurant_id');
				$categories = null;
				$items = null;
				try{
				$categories = MenuCategory::where('restaurant_id','=',$rest)->get();
				}catch(Exception $e){
					$categories = null;
				}
				try{
				$items = DB::table('menu_category')
					->join('restaurant_menu_category_items', function($join){
					$join->on('menu_category.category_id','=','restaurant_menu_category_items.category_id')
					->where('restaurant_id','=',Input::get('restaurant_id'));
				})->get();
				}catch(Exception $e){
					$items = null;
				}
					$title = 'Make order';
					$view = View::make('user.make_order')
						->with('title', $title);
					$view['id'] = $rest;
					$view['categories']=$categories;
					$view['items']= $items;
					return $view;
				}else{
							return Redirect::to('')
								->with('namek', 'Chef can not make orders. Please create private users account.');
						}
			}else{
				return Redirect::to('login')
					->with('namek', 'Please login.');
			}
		}
	}

	function make_order_st1(){
		try{
		if(Auth::check()){
			
			if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type != 'chef'){
				$rest_id = Input::get('restaurant_id');
				$date = Input::get('date');
				$quant = Input::get('quant');
				$user_id = Auth::user()->id;
				return View::make('chef.test')
					->with('title', 'Whatever')
					->with('date', $date)
					->with('id', $rest_id)
					->with('user', $user_id)
					->with('quantity', $quant);
			}else{
						return Redirect::to('')
							->with('namek', 'Chef can not make orders. Please create private users account.');
					}


		}else{
			return Redirect::to('login')
				->with('namek', 'Please login.');
		}
		}catch(Exception $e){
			return Redirect::to('main');
		}
	}
}