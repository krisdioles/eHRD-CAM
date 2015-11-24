<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'training';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['namatraining', 'lokasi', 'anggaran', 'tgltraining', 'keterangan'];

}
