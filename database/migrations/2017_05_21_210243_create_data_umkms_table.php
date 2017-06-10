<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_umkm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('umkm_id')->unsigned();
            $table->foreign('umkm_id')->references('id')->on('umkm')->onDelete('cascade');
            $table->date('tgl_pencatatan');
            $table->integer('omset');
            $table->integer('aset');
            $table->integer('jml_tenagakerja_tetap');
            $table->integer('jml_tenagakerjatidak_tetap');
            $table->string('varian_produk');
            $table->string('kapasitas_produksi');
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
        Schema::dropIfExists('data_umkm');
    }
}
