<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function(Blueprint $table){
        $table->increments('idabsensi');
        $table->integer('pegawai_id')->unsigned();
		$table->timestamp('tglabsen');
        $table->timestamp('waktumasuk');
		$table->timestamp('waktupulang');
		$table->string('status');
        $table->rememberToken();
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
        Schema::drop('absensi');
    }
}
