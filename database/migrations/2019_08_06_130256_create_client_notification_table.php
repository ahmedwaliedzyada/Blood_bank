<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientNotificationTable extends Migration {

	public function up()
	{
		Schema::create('client_notification', function(Blueprint $table) {
			$table->increments('id');
			$table->tinyInteger('is_read')->nullable();
			$table->unsignedInteger('client_id');
			$table->unsignedInteger('notification_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('client_notification');
	}
}
