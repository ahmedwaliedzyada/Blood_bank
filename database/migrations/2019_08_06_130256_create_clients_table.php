<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->integer('phone');
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->date('date_of_birth');
            $table->unsignedInteger('blood_type_id');
			$table->date('last_donation_date');
			$table->unsignedInteger('city_id');
            $table->integer('pin_code')->nullable();
			$table->string('api_token', 60)->unique()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
