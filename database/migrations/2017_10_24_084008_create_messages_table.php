<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('conversation_id')->unsigned();
			$table->foreign('conversation_id')->references('id')->on('conversation')->onDelete('cascade');

			$table->integer('sender')->unsigned();
			$table->foreign('sender')->references('id')->on('users');

			$table->integer('receiver')->unsigned();
			$table->foreign('receiver')->references('id')->on('users');

			$table->integer('sender_status')->default(1);
			$table->integer('receiver_status')->default(1);

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('messages');
	}
}
