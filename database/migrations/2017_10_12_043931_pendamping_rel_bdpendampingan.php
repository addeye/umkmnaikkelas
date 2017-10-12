<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendampingRelBdpendampingan extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pendamping_rel_bdpendampingan', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('pendamping_id')->unsigned();
			$table->foreign('pendamping_id')->references('id')->on('pendamping')->onDelete('cascade');
			$table->integer('bidang_pendampingan_id')->unsigned();
			$table->foreign('bidang_pendampingan_id')->references('id')->on('bidang_pendampingan');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('pendamping_rel_bdpendampingan');
	}
}
