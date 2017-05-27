<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpbPendampingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppb_pendampingan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_pendamping_id')->unsigned();
            $table->foreign('pengajuan_pendamping_id')->references('id')->on('pengajuan_pendamping')->onDelete('cascade');
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
        Schema::dropIfExists('ppb_pendampingan');
    }
}
