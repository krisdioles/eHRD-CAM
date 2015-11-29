<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('phk', function(Blueprint $table){
         $table->increments('idphk');
         $table->integer('pegawai_id')->unsigned();
		 $table->string('nomorsurat');
		 $table->string('jenisphk');
         $table->timestamp('tglphk');
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
        Schema::drop('phk');
    }
}