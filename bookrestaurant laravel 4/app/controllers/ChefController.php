<?php
class ChefController extends BaseController{

	public function get_mainChef(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$title = "Chef_main";
			return View::make('chef.chef_main')
				->with('title', $title);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('')
					->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function get_tableOrders(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$title = "Table orders";
			return View::make('chef.table_orders')
				->with('title', $title);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('chef')
					->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function get_chefMenu(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$title = 'Menu';
			$categories = null;
			$items = null;
			$categories = MenuCategory::where('restaurant_id','=',UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id)->get();
			$items = DB::table('menu_category')
				->join('restaurant_menu_category_items', function($join){
				$join->on('menu_category.category_id','=','restaurant_menu_category_items.category_id')
				->where('restaurant_id','=',UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id);
			})->get();
			$view = View::make('chef.chef_menu')
				->with('title', $title);
			$view['categories']=$categories;
			$view['items']= $items;
			return $view;
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('chef')
					->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function post_save(){
		DB::beginTransaction();
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$validation = MenuCategory::validate(Input::all());
			if($validation->fails()){
				return Redirect::to('chef_menu')
				->withErrors($validation)
				->withInput(Input::all());
			}
			else{
				try{
					$category = new MenuCategory;
					$category->restaurant_id = UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id;
					$category->category = Input::get('category');
					$category->save();
				}catch(Exception $e){
					DB::rollback();
				}
				DB::commit();
			}
			return Redirect::to('chef_menu');
		//	->with('akak', UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('chef_menu')
					->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function post_save_dish(){
		DB::beginTransaction();
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$categ = null;
			$validation = RestaurantMenuItems::validate(Input::all());
			if($validation->fails()){
				return Redirect::to('chef_menu')
				->withErrors($validation)
				->withInput(Input::all());
			}else{
				try{
					$item = new RestaurantMenuItems;
				
				//	$item->restaurant_id = UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id;
					$item->category_id = DB::table('menu_category')
											->where('restaurant_id','=', UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id)
											->where('category','=',Input::get('category'))
											->first()->category_id;
					$item->dish_name = Input::get('dish_name');
					$item->description = Input::get('description');
					$item->price = Input::get('price');
					$item->save();
				}catch(Exception $e){
					DB::rollback();
				}
				DB::commit();
				$categ = Input::get('category');
				return Redirect::to('chef_menu')
					->with('categ', $categ);
			}
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
			return Redirect::to('chef_menu')
				->with('namek', 'Unexpected error. Please try again');
		}
	}

	public function post_removeTab(){
		DB::beginTransaction();
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$validation = MenuCategory::validate1(Input::all());
			if($validation->fails()){
				return Redirect::to('chef_menu')
				->withErrors($validation)
				->withInput(Input::all());
			}
			else{
				try{
				
				$do = DB::table('menu_category')
							->where('restaurant_id','=',UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id)
							->where('category','=',Input::get('category'))->delete();
				
				if($do != null){
					DB::commit();
					return Redirect::to('chef_menu')
						->with('namek', 'category successfully deleted');
				}else{
					return Redirect::to('chef_menu')
						->with('namek', 'category does not exist');
			}
				}catch(Exception $ex){
					DB::rollback();
					$ex = 'This operation is impossible';
					return Redirect::to('chef_menu')
						->withErrors($ex);
				}
			}
			return Redirect::to('chef_menu')
				->with('namek', 'category does not exist');
		//	->with('akak', UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				DB::rollback();
				return Redirect::to('chef_menu')
					->with('namek', 'Unexpected error. Please try again');
			}
	
	}
	public function post_removeDish(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef'){
			$validation = RestaurantMenuItems::validate1(Input::all());
			if($validation->fails()){
				return Redirect::to('chef_menu')
					->with('namek', 'Internal error');
			}else{
				try{
				DB::beginTransaction();
				$title='Remove';
				$akak = Input::get('id');
				$categ = Input::get('categ');
				
					$items = DB::table('restaurant_menu_category_items')
						->join('menu_category', function($join){
						$join->on('menu_category.category_id','=','restaurant_menu_category_items.category_id')
						->where('menu_category.restaurant_id', '=', UserTypes::where('user_id','=',Auth::user()->id)->first()->rest_id)
						->where('restaurant_menu_category_items.id','=',Input::get('id'));
					})->first();
					$it = DB::table('restaurant_menu_category_items')->where('id','=',$items->id)->delete();
				
				}catch(Exception $ex){
					DB::rollback();
					$response = array(
						'namek' => 'This operation is impossible',
						'categ' => $categ );
					return Response::json( $response );
	//				return Redirect::to('chef_menu')
	//					->with('namek', 'This operation is impossible')
	//					->with('categ', $categ);
				}
				DB::commit();
				$response = array(
		        		'namek' => 'Entry deleted',
		        		'item' => $items->id,
		        		'categ' => $categ
		   			);
		    	return Response::json( $response );
	//	    	return Redirect::to('chef_menu')
	//					->with('namek', 'Entry removed successfully')
	//					->with('categ', $categ);
		    }
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
			DB::rollback();
				return Redirect::to('chef_menu')
					->with('namek', 'Unexpected error. Please try again');
			}
	}

}