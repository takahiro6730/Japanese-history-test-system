<?php

namespace Database\Seeders;

use App\Models\Ganre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GanreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ganre::create([
            'ganre_name'=>'グルメ'
        ]);
        Ganre::create([
            'ganre_name'=>'歴史'
        ]);
        Ganre::create([
            'ganre_name'=>'観光'
        ]);
        Ganre::create([
            'ganre_name'=>'市町村'
        ]);
        Ganre::create([
            'ganre_name'=>'産業'
        ]);
    }
}
