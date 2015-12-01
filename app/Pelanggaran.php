<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pelanggaran extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pelanggaran';

    protected $primaryKey = 'idpelanggaran';

    protected $dates = ['tglpelanggaran'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tglpelanggaran', 'jenispelanggaran', 'sanksi', 'keterangan', 'pegawai_id'];


    public function setTglpelanggaranAttribute($date)
    {
        $this->attributes['tglpelanggaran'] = Carbon::parse($date);
    }

    public function getTglpelanggaranAttribute($date)
    {
        return new Carbon($date);
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
