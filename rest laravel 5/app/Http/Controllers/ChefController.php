<?php namespace App\Http\Controllers;
use View;
use Auth;

class ChefController extends Controller{

	public function get_mainChef(){
		$title = "Chef_main";
		return View::make('chef.chef_main')
			->with('title', $title);
	}

	public function get_tableOrders(){
		$title = "Table orders";
		return View::make('chef.table_orders')
			->with('title', $title);
	}

	public function get_chefMenu(){
		$title = 'Menu';
		return View::make('chef.chef_menu')
			->with('title', $title);
	}
}