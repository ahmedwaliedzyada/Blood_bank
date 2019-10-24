<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('link_url', 255);
			$table->string('email', 255);
			$table->integer('phone');
			$table->string('facebook_url', 255);
			$table->string('twitter_url', 255);
			$table->string('youtube_url', 255);
			$table->string('instgram_url', 255);
			$table->string('whatsup_url', 255);
			$table->string('image', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}