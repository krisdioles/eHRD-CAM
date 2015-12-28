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
         $table->integer('pegawai_id')->unsigned();
         $table->timestamp('tglpenggajian');
         $table->timestamp('periodepenggajian');
		 $table->integer('biayabonus');
		 $table->string('keteranganbonus');
		 $table->integer('biayapotongan');
		 $table->string('keteranganpotongan');
		 $table->integer('jumlahpenggajian');
		 $table->string('carabayar');
         $table->string('norekening');
         $table->string('namarekening');
         $table->string('namabank');
         $table->timestamps();
		 
		 $table->foreign('pegawai_id')
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