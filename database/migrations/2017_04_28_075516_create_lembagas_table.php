<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLembagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembaga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_lembaga',9);
            $table->string('nama_lembaga',50);
            $table->string('legalitas',50);        
            $table->text('alamat');
            $table->string('kab_id',10);
            $table->string('telp',20);
            $table->string('email',100);
            $table->string('website',100)->nullable();
            $table->string('pimpinan',50);
            $table->text('layanan');
            $table->string('foto_kantor');
            $table->string('profil_doc');
            $table->string('status');
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
        Schema::dropIfExists('lembaga');
    }
}
