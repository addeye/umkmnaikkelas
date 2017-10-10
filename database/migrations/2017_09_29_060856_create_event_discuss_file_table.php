<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDiscussFileTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('event_discuss_file', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_discuss_id')->unsigned();
			$table->foreign('event_discuss_id')->references('id')->on('event_discuss')->onDelete('cascade');
			$table->string('file_name');
			$table->string('path');
			$table->string('type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('event_discuss_file');
	}
}
