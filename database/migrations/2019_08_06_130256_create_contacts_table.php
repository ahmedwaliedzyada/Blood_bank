<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id');
			$table->string('name', 255);
			$table->string('email', 255);
			$table->integer('phone');
			$table->string('title', 255);
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}