<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_produk' => fake()->word(),
            'kategori_produk' => fake()->randomElement(['Alat Olahraga', 'Alat Musik']),
            'harga_barang' => 1000000,
            'harga_jual' => 800000,
            'stok' => fake()->randomNumber(2, true)

        ];
    }
}
