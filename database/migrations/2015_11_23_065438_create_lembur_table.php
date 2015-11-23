<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('lembur', function($table){
         $table->increments('idlembur');
         $table->integer('idpegawai')->unsigned();
         $table->date('tgllembur');
		 $table->integer('jangkawaktu');
		 $table->string('keterangan');
         $table->timestamps();
		 
		 $table->foreign('idpegawai')
                  ->references('idpegawai')
                  ->on('pegawai')
                  ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lembur');
    }
}
