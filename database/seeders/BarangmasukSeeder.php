<?php

namespace Database\Seeders;

use App\Models\Barangmasuk;
use Illuminate\Database\Seeder;

class BarangmasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barangmasuk::factory()
            ->count(5)
            ->create();
    }
}
