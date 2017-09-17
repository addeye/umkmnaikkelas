<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKeteranganJasaPendampingan extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('jasa_pendampingan', function (Blueprint $table) {
			$table->text('keterangan')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('jasa_pendampingan', function (Blueprint $table) {
			$table->dropColumn('keterangan');
		});
	}
}
