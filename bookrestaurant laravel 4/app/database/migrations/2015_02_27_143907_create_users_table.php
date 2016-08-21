<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('login_name');
			$table->string('email')->nullable();
			$table->string('password');
			$table->string('code')->nullable();
			$table->integer('active')->nullable();
			$table->string('remember_token')->nullable();
			$table->timestamps();
			$table->index('id');
		});
		
	//	DB::statement('drop table users');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
