<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('event', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->date('start_date');
			$table->date('end_date');
			$table->string('start_time')->nullable();
			$table->string('end_time')->nullable();
			$table->string('city');
			$table->text('alamat');
			$table->text('description');
			$table->text('content');
			$table->string('image')->nullable();
			$table->string('publish', 5)->default('No');
			$table->string('show_front', 5)->default('No');
			$table->string('status', 10)->default('Open');
			$table->integer('quota');
			$table->string('role_level')->default('Semua');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('event');
	}
}
