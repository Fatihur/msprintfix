<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Penjualandetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualandetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penjualandetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jumlah' => $this->faker->randomNumber(1),
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'penjualan_id' => \App\Models\Penjualan::factory(),
            'produk_id' => \App\Models\Produk::factory(),
        ];
    }
}
