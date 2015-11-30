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
    protected $fillable = ['jeniscuti', 'tglpengajuan', 'tglawal', 'tglakhir', 'nomorsurat', 'status', 'pegawai_id'];

    public function scopeFuture($query)
    {
        $query->where('created_at', '>=', Carbon::today());
    }

    public function scopeFuture1($query)
    {
        $query->where('tglawal', '>=', Carbon::today());
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
