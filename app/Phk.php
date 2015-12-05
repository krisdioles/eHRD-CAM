<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Phk extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phk';

    protected $primaryKey = 'idphk';

    protected $dates = ['tglphk'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tglphk', 'jenisphk', 'nomorsurat', 'keterangan', 'pegawai_id'];


    public function setTglphkAttribute($date)
    {
        $this->attributes['tglphk'] = Carbon::parse($date);
    }

    public function getTglphkAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
