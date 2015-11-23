<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pegawai', function($table){
         $table->increments('idpegawai');
         $table->string('password');
         $table->string('role');
         $table->string('nama');
		 $table->string('alamat');
		 $table->string('jeniskelamin');
		 $table->date('tgllahir');
         $table->integer('gajipokok');
		 $table->integer('tunjangantetap');
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
        Schema::drop('pegawai');
    }
}
