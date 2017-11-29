<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('umkm', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('id_umkm')->unique();
			$table->string('nama_usaha', 100);
			$table->string('nama_pemilik', 50);
			$table->text('alamat');
			$table->integer('kabkota_id');
			$table->integer('kecamatan_id');
			$table->string('no_ktp');
			$table->string('path_ktp')->nullable();
			$table->string('no_npwp')->nullable();
			$table->string('path_npwp')->nullable();
			$table->string('telp');
			$table->string('email');
			$table->string('badan_hukum')->nullable();
			$table->string('tahun_mulai');
			$table->string('skala_usaha', 20);
			$table->integer('bidang_usaha_id');
			$table->string('produk')->nullable();
			$table->string('komunitas_asosiasi', 100)->nullable();
			$table->string('website')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('whatsapp')->nullable();
			$table->string('instagram')->nullable();
			$table->string('online', 5);
			$table->string('sentra_umkm', 5);
			$table->integer('rating', 5)->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('umkm');
	}
}
