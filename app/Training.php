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
    protected $fillable = ['namatraining', 'lokasi', 'anggaran', 'tgltraining', 'keterangan'];

    public function scopeFuture($query)
    {
        $query->where('tgltraining', '>=', Carbon::today());
    }

    public function setTgltrainingAttribute($date)
    {
        $this->attributes['tgltraining'] = Carbon::parse($date);
    }
}