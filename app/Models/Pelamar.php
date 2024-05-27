<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelamar extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'pelamar';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'nama',
    //     'telpon',
    //     'alamat',
    //     'email',
    // ];
    protected $guarded = ['id'];
    protected $with = ['jabatan', 'pelamarfile', 'lowongan'];


    public function pelamarfile()
    {   //setiap pegawai memiliki satu file
        return $this->hasOne(Pelamarfile::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function scopeFilter($query, $search)
    {
        // $query->when($filters['search'] ?? false, function($query, $search) {

        // });
        $query->when($search, function ($query, $search) {
            $query->whereHas('pelamarfile', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('telpon', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });

            $query->orwhereHas('jabatan', function ($query) use ($search) {
                $query->where('jabatan.nama', 'like', '%' . $search . '%');
            });

            $query->orwhereHas('lowongan', function ($query) use ($search) {
                $query->where('lowongan.judul', 'like', '%' . $search . '%');
            });
        });
    }
}
