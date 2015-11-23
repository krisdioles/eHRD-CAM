<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('training', function(Blueprint $table){
         $table->increments('idtraining');
		 $table->string('namatraining');
         $table->date('tgltraining');
		 $table->integer('anggaran');
		 $table->string('lokasi');
		 $table->string('keterangan');
         $table->timestamps();
		 
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('training');
    }
}