<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualandetail;

class PenjualandetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualandetail::factory()
            ->count(5)
            ->create();
    }
}
