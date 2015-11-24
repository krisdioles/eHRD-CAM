<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('penilaian', function(Blueprint $table){
         $table->increments('idpenilaian');
         $table->integer('idpegawai')->unsigned();
         $table->timestamp('tglpenilaian');
		 $table->integer('nilaikompetensi');
		 $table->integer('nilaikedisiplinan');
		 $table->integer('nilaiperilaku');
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
        Schema::drop('penilaian');
    }
}
