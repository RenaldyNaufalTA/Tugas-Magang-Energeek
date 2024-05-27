<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public function lowongan()
    {   //setiap file memiliki satu pegawai
        return $this->hasMany(Lowongan::class);
    }

    public function pelamar()
    {
        return $this->hasMany(Pelamar::class);
    }
}
