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
            $table->string('nama_pendamping');
            $table->text('alamat_domisili');
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->string('jenis_kelamin',1);
            $table->string('telp');
            $table->string('email');
            $table->string('pendidikan');
            $table->text('pengalaman');
            $table->text('sertifikat');
            $table->text('bidang_pendampingan');
            $table->text('bidang_keahlian');
            $table->string('provinsi_id');
            $table->string('kabkota_id');
            $table->text('kabkota_tambahan');
            $table->integer('lembaga_id')->unsigned();
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
            $table->string('foto_ktp');
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
