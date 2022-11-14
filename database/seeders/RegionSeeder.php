<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            Region::create(['name' => 'Cisarua ' . $i]);
            Region::create(['name' => 'Ciawi ' . $i]);
            Region::create(['name' => 'Cicurug ' . $i]);
            Region::create(['name' => 'Cibedug ' . $i]);
            Region::create(['name' => 'Tajur ' . $i]);
            Region::create(['name' => 'Wikrama ' . $i]);
        }
    }
}
