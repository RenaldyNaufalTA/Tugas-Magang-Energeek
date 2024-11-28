<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Jabatan::create([
            'nama' => 'Web Developer',
        ]);

        Jabatan::create([
            'nama' => 'Game Developer',
        ]);

        Jabatan::create([
            'nama' => 'Designer',
        ]);

        Lowongan::create([
            'judul' => 'Backend Developer',
            'slug' => 'backend-developer',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quia.',
            'end_date' => '2040-12-20',
            'jabatan_id' => 1,
            'created_by' => 1
        ]);
    }
}
