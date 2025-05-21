<?php

namespace Database\Factories;

use App\Models\Barangmasuk;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangmasukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barangmasuk::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jumlah' => $this->faker->randomNumber(0),
            'harga_beli' => $this->faker->randomNumber(0),
            'produk_id' => \App\Models\Produk::factory(),
            'supplier_id' => \App\Models\Supplier::factory(),
        ];
    }
}
