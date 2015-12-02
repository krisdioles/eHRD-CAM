<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penilaian extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penilaian';

    protected $primaryKey = 'idpenilaian';

    protected $dates = ['tglpenilaian'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tglpenilaian', 'nilaikompetensi', 'nilaikedisiplinan', 'nilaiperilaku', 'keterangan', 'pegawai_id'];


    public function setTglpenilaianAttribute($date)
    {
        $this->attributes['tglpenilaian'] = Carbon::parse($date);
    }

    public function getTglpenilaianAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}