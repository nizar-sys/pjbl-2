<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            Grade::create(['name' => 'RPL XII-' . $i]);
            Grade::create(['name' => 'MMD XII-' . $i]);
            Grade::create(['name' => 'TKJ XII-' . $i]);
            Grade::create(['name' => 'BDP XII-' . $i]);
            Grade::create(['name' => 'HTL XII-' . $i]);
            Grade::create(['name' => 'TBG XII-' . $i]);
            Grade::create(['name' => 'OTKP XII-' . $i]);
        }
    }
}
