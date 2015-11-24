<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('penggajian', function(Blueprint $table){
         $table->increments('idpenggajian');
         $table->integer('idpegawai')->unsigned();
         $table->timestamp('tglpenggajian');
		 $table->integer('biayabonus');
		 $table->string('keteranganbonus');
		 $table->integer('biayapotongan');
		 $table->string('keteranganpotongan');
		 $table->integer('jumlahpenggajian');
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
        Schema::drop('penggajian');
    }
}