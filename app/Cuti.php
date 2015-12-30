<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cuti extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuti';

    protected $primaryKey = 'idcuti';

    protected $dates = ['tglpengajuan', 'tglawal', 'tglakhir'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'jeniscuti', 
    'alamatcuti',
    'tglpengajuan', 
    'tglawal', 
    'tglakhir', 
    'nomorsurat', 
    'status', 
    'pegawai_id'
    ];

    public function setTglawalAttribute($date)
    {
        $this->attributes['tglawal'] = Carbon::parse($date);
    }

    public function getTglawalAttribute($date)
    {
        return new Carbon($date);
    }

    public function setTglakhirAttribute($date)
    {
        $this->attributes['tglakhir'] = Carbon::parse($date);
    }

    public function getTglakhirAttribute($date)
    {
        return new Carbon($date);
    }

    public function scopeFuture($query)
    {
        $query->where('tglawal', '>=', Carbon::today());
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
