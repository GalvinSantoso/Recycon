<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Vas Bunga',
                'price' => 1500,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eos, ea necessitatibus mollitia, incidunt culpa dolores rem minus officiis excepturi temporibus vel harum et.',
                'image' => 'item1.jpg',
                'category' => 'recycle'
            ],
            [
                'name' => 'Tabungan Paus',
                'price' => 2000,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'image' => 'item2.jpg',
                'category' => 'recycle'
            ],
            [
                'name' => 'Botol tanaman bunga',
                'price' => 1200,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eos, ea necessitatibus mollitia, incidunt culpa dolores rem minus officiis excepturi temporibus vel harum et.',
                'image' => 'item3.jpg',
                'category' => 'recycle'
            ],
            [
                'name' => 'Pot Bunga Bohlam',
                'price' => 1600,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, a.',
                'image' => 'item4.jpg',
                'category' => 'recycle'
            ],
            [
                'name' => 'Botol Air Plastik',
                'price' => 1200,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, a.',
                'image' => 'item5.jpg',
                'category' => 'second'
            ],
            [
                'name' => 'Skateboard Jaring Ikan',
                'price' => 1400,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, a.',
                'image' => 'item6.jpg',
                'category' => 'second'
            ],

        ]);
    }
}
