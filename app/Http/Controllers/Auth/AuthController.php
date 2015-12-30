<?php

namespace App\Http\Controllers\Auth;

use App\Pegawai;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:pegawai',
            'password' => 'required|confirmed|min:6',
            'kodepegawai' => 'required',
            'alamat' => 'required',
            'jeniskelamin' => 'required',
            'telepon' => 'required|numeric',
            'tgllahir' => 'required|date',
            'agama' => 'required',
            'statuskawin' => 'required',
            'pendidikanterakhir' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $pegawai=Pegawai::create([
            'kodepegawai' => $data['kodepegawai'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'jeniskelamin' => $data['jeniskelamin'],
            'tgllahir' => $data['tgllahir'],
            'agama' => $data['agama'],
            'statuskawin' => $data['statuskawin'],
            'pendidikanterakhir' => $data['pendidikanterakhir'],
            'statusaktif' => 'aktif',
        ]);

        \App\Penilaian::create([
            'pegawai_id' => $pegawai->idpegawai,
            'nilaikompetensi' => '0',
            'nilaikedisiplinan' => '0',
            'nilaiperilaku' => '0',
            'keterangan' => 'baru',
        ]);

        \App\Penggajian::create([
            'pegawai_id' => $pegawai->idpegawai,
            'biayabonus' => '0',
            'keteranganbonus' => 'baru',
            'biayapotongan' => '0',
            'keteranganpotongan' => 'baru',
        ]);

        \App\Absensi::create([
            'pegawai_id' => $pegawai->idpegawai,
            'tglabsen' => Carbon::now(),
            'waktumasuk' => Carbon::create('2000', '1', '1'),
            'waktupulang' => Carbon::create('2000', '1', '1'),
        ]);

        return $pegawai;
    }
}
