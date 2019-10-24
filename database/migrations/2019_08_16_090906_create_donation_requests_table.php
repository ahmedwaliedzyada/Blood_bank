<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('age');
            $table->integer('phone');
            $table->integer('amount');
            $table->string('hospital_name', 255);
            $table->decimal('longitude',10, 8);
            $table->decimal('latitude',10 , 8);
            $table->text('notes');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('blood_type_id');
            $table->unsignedInteger('client_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_requests');
    }
}
