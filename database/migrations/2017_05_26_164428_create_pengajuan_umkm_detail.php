<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanUmkmDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_umkm_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_umkm_id')->unsigned();
            $table->foreign('pengajuan_umkm_id')->references('id')->on('pengajuan_umkm')->onDelete('cascade');
            $table->integer('bidang_pendampingan_id');
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
        Schema::dropIfExists('pengajuan_umkm_detail');
    }
}
