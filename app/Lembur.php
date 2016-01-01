<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lembur extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lembur';

    protected $primaryKey = 'idlembur';

    protected $dates = ['tgllembur'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['jangkawaktu', 'tgllembur', 'keterangan', 'pegawai_id', 'status', 'nomorspkl'];

    public function setTgllemburAttribute($date)
    {
        $this->attributes['tgllembur'] = Carbon::parse($date);
    }

    public function getTgllemburAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
