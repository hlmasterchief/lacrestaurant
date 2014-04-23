<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contacts', function($table) {
            $table->increments('id');
            $table->string('name, 50');
            $table->string('email');
            $table->tinyInteger('type');
            $table->string('subject');
            $table->mediumText('comment');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('contacts');
	}

}
