<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penggajian extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penggajian';

    protected $primaryKey = 'idpenggajian';

    protected $dates = ['tglpenggajian', 'periodepenggajian'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tglpenggajian', 
        'periodepenggajian', 
        'biayabonus',  
        'keteranganbonus', 
        'biayapotongan', 
        'jumlahpenggajian', 
        'keteranganpotongan', 
        'carabayar',
        'norekening',
        'namarekening',
        'namabank',
        'pegawai_id'
    ];


    public function setTglpenggajianAttribute($date)
    {
        $this->attributes['tglpenggajian'] = Carbon::parse($date);
    }

    public function setPeriodepenggajianAttribute($date)
    {
        $this->attributes['periodepenggajian'] = Carbon::parse($date);
    }

    public function getTglpenggajianAttribute($date)
    {
        return new Carbon($date);
    }

    public function getPeriodepenggajianAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
