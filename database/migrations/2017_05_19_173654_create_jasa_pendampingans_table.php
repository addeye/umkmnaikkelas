<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasaPendampingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_pendampingan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pendamping_id');
            $table->integer('lembaga_id');
            $table->string('title');
            $table->text('bidang_pendampingan')->nullable();
            $table->text('bidang_keahlian')->nullable();
            $table->text('deskripsi');
            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('netto');
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
        Schema::dropIfExists('jasa_pendampingan');
    }
}
