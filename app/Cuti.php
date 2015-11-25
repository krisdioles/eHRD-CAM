<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['jeniscuti', 'tglpengajuan', 'tglawal', 'tglakhir', 'nomorsurat', 'status'];
}
