<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Training extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'training';

    protected $primaryKey = 'idtraining';

    protected $dates = ['tgltraining'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'namatraining', 
        'lokasi', 
        'nomorsurat',
        'anggaran', 
        'tgltraining', 
        'keterangan',
        'penyelenggara',
    ];

    public function scopeFuture($query)
    {
        $query->where('tgltraining', '>=', Carbon::today());
    }

    public function setTgltrainingAttribute($date)
    {
        $this->attributes['tgltraining'] = Carbon::parse($date);
    }

    public function getTgltrainingAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsToMany('App\Pegawai');
    }

    public function getPegawaiListAttribute()
    {
        return $this->pegawai->lists('idpegawai')->all();
    }
}