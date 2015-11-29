<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailtrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('detailtraining', function(Blueprint $table){
         $table->integer('idtraining')->unsigned();
         $table->integer('pegawai_id')->unsigned();
         $table->timestamps();
		 $table->foreign('training_id')
                  ->references('idtraining')
                  ->on('training')
                  ->onDelete('cascade');
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
        Schema::drop('detailtraining');
    }
}