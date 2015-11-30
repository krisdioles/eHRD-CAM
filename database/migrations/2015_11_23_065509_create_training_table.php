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
            $table->timestamp('tgltraining');
    		$table->integer('anggaran');
    		$table->string('lokasi');
    		$table->string('keterangan');
            $table->timestamps();
        });

        Schema::create('pegawai_training', function(Blueprint $table){
            $table->integer('pegawai_id')->unsigned()->index();
            $table->foreign('pegawai_id')->references('idpegawai')->on('pegawai')->onDelete('cascade');

            $table->integer('training_id')->unsigned()->index();
            $table->foreign('training_id')->references('idtraining')->on('training')->onDelete('cascade');

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
        Schema::drop('pegawai_training');
    }
}