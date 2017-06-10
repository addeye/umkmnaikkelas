<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpbFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppb_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_pendamping_id')->unsigned();
            $table->foreign('pengajuan_pendamping_id')->references('id')->on('pengajuan_pendamping')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('type','5');
            $table->string('path');
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
        Schema::dropIfExists('ppb_files');
    }
}
