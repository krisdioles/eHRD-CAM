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
         Schema::create('lembur', function(Blueprint $table){
         $table->increments('idlembur');
         $table->integer('pegawai_id')->unsigned();
         $table->timestamp('tgllembur');
		 $table->integer('jangkawaktu');
		 $table->string('nomorspkl');
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
        Schema::drop('lembur');
    }
}
