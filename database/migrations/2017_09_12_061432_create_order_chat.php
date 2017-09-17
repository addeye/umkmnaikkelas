<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderChat extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('order_chat', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('order_konsultasi_id')->unsigned();
			$table->foreign('order_konsultasi_id')->references('id')->on('order_konsultasi')->onDelete('cascade');
			$table->text('chat');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('order_chat');
	}
}
