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
         $table->timestamp('tglpengajuan');
		 $table->timestamp('tglawal');
		 $table->timestamp('tglakhir');
		 $table->string('nomorsurat');
         $table->string('status');
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
