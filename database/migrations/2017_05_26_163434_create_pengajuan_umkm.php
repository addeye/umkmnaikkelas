<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanUmkm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_umkm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('umkm_id')->unsigned();
            $table->foreign('umkm_id')->references('id')->on('umkm')->onDelete('cascade');
            $table->string('nama');
            $table->string('telp');
            $table->string('email');
            $table->date('tanggal');
            $table->string('tahun');
            $table->text('keterangan');
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
        Schema::dropIfExists('pengajuan_umkm');
    }
}
