<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamarfile extends Model
{
    protected $table = 'pelamarfile';
    protected $primaryKey = 'id';
    protected $fillable = ['filename'];
    protected $dates = ['deleted_at'];
    // protected $with = ['pelamar'];

    public function pelamar()
    {
        //file di miliki oleh pegawai
        return $this->belongsTo(Pelamar::class);
    }
}
