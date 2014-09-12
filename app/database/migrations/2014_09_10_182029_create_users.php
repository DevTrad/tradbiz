<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

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
			$table->string('username')->unique();
			$table->string('password');
			$table->string('email')->unique();
			$table->string('first_name')->unique();
			$table->string('last_name')->unique();
			$table->string('account_type');
			$table->float('monthly_payment');
			$table->string('church');
			$table->boolean('active');
			$table->string('activation_token');
			$table->timestamps(); // updated_at, created_at
			$table->rememberToken(); // for logins
		});
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
