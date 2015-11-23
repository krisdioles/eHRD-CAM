<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cuti', function(Blueprint $table){
         $table->increments('idcuti');
         $table->integer('idpegawai')->unsigned();
		 $table->string('jeniscuti');
         $table->date('tglpengajuan');
		 $table->date('tglawal');
		 $table->date('tglakhir');
		 $table->string('nomorsurat');
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
        Schema::drop('cuti');
    }
}
