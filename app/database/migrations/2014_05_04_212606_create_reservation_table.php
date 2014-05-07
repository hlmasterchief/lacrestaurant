<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reservations', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->tinyInteger('numbers');
            $table->text('phonenumber');
            $table->mediumText('requirements')->default('');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('reservations');
    }

}
