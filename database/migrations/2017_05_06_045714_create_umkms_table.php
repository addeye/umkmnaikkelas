<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_usaha',100);
            $table->string('nama_pemilik',50);
            $table->integer('lembaga_id')->unsigned();
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
            $table->string('skala_usaha',20);
            $table->integer('bidang_usaha_id');
            $table->string('komunitas_asosiasi',100);
            $table->integer('omset');
            $table->text('alamat');
            $table->integer('kabkota_id');
            $table->integer('kecamatan_id');
            $table->string('no_ktp');
            $table->string('path_ktp')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('path_npwp')->nullable();
            $table->string('telp');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('online',5);
            $table->integer('jml_tenaga_kerja');
            $table->string('jangkauan_pemasaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkm');
    }
}
