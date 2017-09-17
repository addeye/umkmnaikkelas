<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderKonsultasi extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_konsultasi', function (Blueprint $table) {
			$table->increments('id');
			$table->string('code', 10)->unique();
			$table->string('subject');
			$table->string('status');

			$table->integer('bidang_pendampingan_id')->unsigned();
			$table->foreign('bidang_pendampingan_id')->references('id')->on('bidang_pendampingan');

			$table->integer('jasa_pendampingan_id')->unsigned()->nullable();
			$table->foreign('jasa_pendampingan_id')->references('id')->on('jasa_pendampingan')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_konsultasi');
	}
}
