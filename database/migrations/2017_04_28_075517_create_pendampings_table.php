<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendampingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendamping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pendamping',25);
            $table->string('nama_pendamping',50);
            $table->text('alamat_domisili');
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->string('jenis_kelamin',1);
            $table->string('telp',20);
            $table->string('email',50);
            $table->string('pendidikan',15);
            $table->text('pengalaman')->nullable();
            $table->text('sertifikat')->nullable();
            $table->text('bidang_pendampingan');
            $table->text('bidang_keahlian');
            $table->string('kabkota_id');
            $table->text('kabkota_tambahan');
            $table->integer('lembaga_id')->unsigned();
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
            $table->string('foto_ktp')->nullable();
            $table->integer('validasi')->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pendamping');
    }
}
