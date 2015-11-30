<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            'nama' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'kodepegawai' => 'CAM000',
            'role' => 'admin',
        ]);
    }
}
