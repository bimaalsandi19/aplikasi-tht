<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Kategori;
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
            'name' => 'Bima Al Sandi',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password')
        ]);

        // Barang::factory(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kategori::create([
            'kategori_produk' => 'Alat Olahraga',
        ]);
        Kategori::create([
            'kategori_produk' => 'Alat Musik',
        ]);
    }
}
