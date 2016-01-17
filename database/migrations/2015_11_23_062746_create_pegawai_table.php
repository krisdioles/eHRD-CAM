<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function(Blueprint $table){
        $table->increments('idpegawai');
        $table->string('password');
        $table->string('kodepegawai');
        $table->string('role');
        $table->string('nama');
        $table->string('foto');
        $table->string('email');
        $table->string('alamat');
        $table->string('jeniskelamin');
        $table->string('telepon');
        $table->date('tgllahir');
        $table->string('agama');
        $table->string('statuskawin');
        $table->string('pendidikanterakhir');
        $table->string('jabatan');
        $table->integer('gajipokok');
        $table->integer('tunjangantetap');
        $table->integer('hakcuti');
        $table->string('statusaktif');
        $table->softDeletes();
        $table->rememberToken();
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
        Schema::drop('pegawai');
    }
}
