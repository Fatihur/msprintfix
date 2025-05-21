<?php

namespace Database\Seeders;

use App\Models\Wa;
use Illuminate\Database\Seeder;

class WaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wa::create([
'wa'=>'6281239741776'
        ]);
    }
}
