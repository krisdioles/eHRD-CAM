<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pelanggaran', function(Blueprint $table){
         $table->increments('idpelanggaran');
         $table->integer('pegawai_id')->unsigned();
         $table->timestamp('tglpelanggaran');
		 $table->string('jenispelanggaran');
		 $table->string('sanksi');
		 $table->string('keterangan');
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
        Schema::drop('pelanggaran');
    }
}
