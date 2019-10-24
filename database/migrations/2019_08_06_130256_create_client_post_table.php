<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('client_id');
			$table->unsignedInteger('post_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}
