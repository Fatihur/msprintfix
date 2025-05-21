<?php

namespace Database\Factories;

use App\Models\Wa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wa' => $this->faker->text(255),
        ];
    }
}
