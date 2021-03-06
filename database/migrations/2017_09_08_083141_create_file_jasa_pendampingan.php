<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileJasaPendampingan extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('jasa_file', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('jasa_pendampingan_id')->unsigned();
			$table->foreign('jasa_pendampingan_id')->references('id')->on('jasa_pendampingan')->onDelete('cascade');
			$table->string('file_name');
			$table->string('path');
			$table->string('file_type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('jasa_file');
	}
}
