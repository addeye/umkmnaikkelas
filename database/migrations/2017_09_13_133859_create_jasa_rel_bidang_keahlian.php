<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaRelBidangKeahlian extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('jasa_rel_bidang_keahlian', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('jasa_pendampingan_id')->unsigned();
			$table->foreign('jasa_pendampingan_id')->references('id')->on('jasa_pendampingan')->onDelete('cascade');
			$table->integer('bidang_keahlian_id')->unsigned();
			$table->foreign('bidang_keahlian_id')->references('id')->on('bidang_keahlian');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('jasa_rel_bidang_keahlian');
	}
}
