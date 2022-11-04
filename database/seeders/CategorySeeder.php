<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kesehatan = Category::create(['name' => 'Kesehatan']);
        $keselamatan = Category::create(['name' => 'Keselamatan']);
        $karakter = Category::create(['name' => 'Karakter']);

        Activity::create([
            'name' => 'Pencahayaan ruang kerja cukup.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Sirkulasi udara pada ruang kerja baik.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Duduk menggunakan meja dan kursi yang nyaman.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Punggung dan leher tegak, tidak bungkuk.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Posisi siku sejajar dengan meja/keyboard.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Posisi kaki tidak menggantung dan tidak menekuk, pas menapak lantai.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Posisi layar sejajar dengan mata.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Melihat ke arah jauh setiap 30 menit melihat layar.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Melakukan stretching setiap 1 jam duduk.',
            'category_id' => $kesehatan->id
        ]);
        Activity::create([
            'name' => 'Minum 200 ml (segelas) air setiap 2 jam.',
            'category_id' => $kesehatan->id
        ]);

        Activity::create([
            'name' => 'Tidak ada benda yang berbahaya di dekat peralatan kerja (misalnya air yang terbuka, korek api, dsb).',
            'category_id' => $keselamatan->id
        ]);
        Activity::create([
            'name' => 'Kabel tertata rapi dan tidak terbuka.',
            'category_id' => $keselamatan->id
        ]);
        Activity::create([
            'name' => 'Stop kontak aman dan tidak terbuka.',
            'category_id' => $keselamatan->id
        ]);
        Activity::create([
            'name' => 'Peralatan kerja dirapikan kembali setelah digunakan.',
            'category_id' => $keselamatan->id
        ]);

        Activity::create([
            'name' => 'Berdoa sebelum dan sesudah bekerja.',
            'category_id' => $karakter->id
        ]);
        Activity::create([
            'name' => 'Berpartisipasi dalam tim dan membantu teman.',
            'category_id' => $karakter->id
        ]);
        Activity::create([
            'name' => 'Bagi muslim, melaksanakan sholat tepat waktu (tidak menunda-nunda).',
            'category_id' => $karakter->id
        ]);
    }
}
