<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDiscussTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('event_discuss', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_follower_id')->unsigned();
			$table->foreign('event_follower_id')->references('id')->on('event_follower')->onDelete('cascade');
			$table->text('comment');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('event_discuss');
	}
}
