<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produk::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->text(255),
            'deskripsi' => $this->faker->text(255),
            'gambar' => $this->faker->text(255),
            'harga' => $this->faker->randomNumber(0),
            'stok' => $this->faker->randomNumber(0),
            'kategori_id' => \App\Models\Kategori::factory(),
        ];
    }
}
