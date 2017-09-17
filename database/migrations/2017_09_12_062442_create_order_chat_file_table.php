<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderChatFileTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_chat_file', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('order_chat_id')->unsigned();
			$table->foreign('order_chat_id')->references('id')->on('order_chat')->onDelete('cascade');
			$table->string('path');
			$table->string('file_name');
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
		Schema::dropIfExists('order_chat_file');
	}
}
