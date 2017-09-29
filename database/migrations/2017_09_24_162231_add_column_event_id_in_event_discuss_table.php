<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEventIdInEventDiscussTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('event_discuss', function (Blueprint $table) {
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('event_discuss', function (Blueprint $table) {
			//
		});
	}
}
