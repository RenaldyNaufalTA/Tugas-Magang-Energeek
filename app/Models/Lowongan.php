<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lowongan extends Model
{
    use Sluggable;

    protected $table = 'lowongan';
    protected $dates = ['created_at', 'end_date'];
    protected $primaryKey = 'id';
    protected $fillable = ([
        'judul', 'slug', 'deskripsi', 'end_date', 'jabatan'
    ]);

    protected $with = ['jabatan'];

    public function pelamar()
    {
        //lowongan dimiliki pelamar
        return $this->hasMany(Pelamar::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
