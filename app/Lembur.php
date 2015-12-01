<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['jangkawaktu', 'tgllembur', 'keterangan', 'pegawai_id', 'status'];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
