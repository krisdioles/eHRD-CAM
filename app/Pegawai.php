<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Pegawai extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pegawai';

    protected $primaryKey = 'idpegawai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['kodepegawai', 'password', 'nama', 'email', 'role', 'alamat', 'jeniskelamin', 'tgllahir', 'gajipokok', 'tunjangantetap'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function training()
    {
        return $this->belongsToMany('App\Training')->withTimestamps();
    }

    public function cuti()
    {
        return $this->hasMany('App\Cuti');
    }

    public function lembur()
    {
        return $this->hasMany('App\Lembur');
    }

    public function penggajian()
    {
        return $this->hasMany('App\Penggajian');
    }

    public function penilaian()
    {
        return $this->hasMany('App\Penilaian');
    }

    public function pelanggaran()
    {
        return $this->hasMany('App\Pelanggaran');
    }

    public function phk()
    {
        return $this->hasMany('App\Phk');
    }
}
