<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUmkmIdOnOrderKonsultasiTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('order_konsultasi', function (Blueprint $table) {
			$table->integer('umkm_id')->unsigned();
			$table->foreign('umkm_id')->references('id')->on('umkm')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('order_konsultasi', function (Blueprint $table) {
			//
		});
	}
}
