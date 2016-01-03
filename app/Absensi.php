<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absensi extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'absensi';

    protected $primaryKey = 'idabsensi';

    protected $dates = ['waktupulang'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['waktumasuk' ,'waktupulang', 'statusmasuk', 'statuspulang', 'keterangan', 'pegawai_id'];

    public function setWaktupulangAttribute($date)
    {
        $this->attributes['waktupulang'] = Carbon::parse($date);
    }

    public function getWaktupulangAttribute($date)
    {
        return new Carbon($date);
    }

    public function setWaktumasukAttribute($date)
    {
        $this->attributes['waktumasuk'] = Carbon::parse($date);
    }

    public function getWaktumasukAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
