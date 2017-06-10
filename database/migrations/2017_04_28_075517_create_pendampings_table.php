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
            $table->float('lat',10,6)->nullable();
            $table->float('lng',10,6)->nullable();
            $table->string('jenis_kelamin',1);
            $table->string('telp',20);
            $table->string('email',50);
            $table->string('pendidikan',15)->nullable();
            $table->string('tahun_mulai',4)->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('sertifikat')->nullable();
            $table->text('bidang_pendampingan')->nullable();
            $table->text('bidang_keahlian')->nullable();
            $table->text('bidang_usaha')->nullable();
            $table->string('kabkota_id')->nullable();
            $table->text('kabkota_tambahan')->nullable();
            $table->integer('lembaga_id')->nullable();
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
