<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_category', function(Blueprint $table)
		{
			$table->increments('category_id');
			$table->integer('restaurant_id')->unsigned();
			$table->string('category');
			$table->timestamps();
			$table->foreign('restaurant_id')->references('restaurant_id')->on('restaurants');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_category');
	}

}
