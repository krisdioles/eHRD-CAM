<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penggajian';

    protected $primaryKey = 'idpenggajian';

    protected $dates = ['tglpenggajian'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tglpenggajian', 'biayabonus', 'anggaran', 'keteranganbonus', 'biayapotongan', 'jumlahpenggajian'];


    public function setTglpenggajianAttribute($date)
    {
        $this->attributes['tglpenggajian'] = Carbon::parse($date);
    }

    public function getTglpenggajianAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
