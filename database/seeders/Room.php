<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Room extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_phong')->insert(
            [
                'id' => 1,
                'id_lp' => 1,
                'name' => 'Room for 2 people',
                'soLuong' => 2,
                'price' => 2000,
                'image' => Str::random(10) . '.jpg',
                'img_descrition' => Str::random(10) . '.jpg' . ' | ' . Str::random(10) . '.jpg',
                'description' => 'Love Lock Bridge is 3.6 km from the property, while Indochina Riverside Mall is 3.9 km away. The nearest airport is Da Nang International Airport, 7 km from London Hotel and Apartments Da Nang, and the property offers an airport shuttle service at a surcharge.',
                'note' => 'N/a',
                'action' => 1
            ]
        );
        DB::table('table_phong')->insert(
            [
                'id' => 2,
                'id_lp' => 2,
                'name' => 'Room for 2 people',
                'soLuong' => 2,
                'price' => 2000,
                'image' => Str::random(10) . '.jpg',
                'img_descrition' => Str::random(10) . '.jpg' . ' | ' . Str::random(10) . '.jpg',
                'description' => 'Love Lock Bridge is 3.6 km from the property, while Indochina Riverside Mall is 3.9 km away. The nearest airport is Da Nang International Airport, 7 km from London Hotel and Apartments Da Nang, and the property offers an airport shuttle service at a surcharge.',
                'note' => 'N/a',
                'action' => 2
            ]
        );
        DB::table('table_phong')->insert(
            [
                'id' => 3,
                'id_lp' => 3,
                'name' => 'Room for 2 people',
                'soLuong' => 2,
                'price' => 2000,
                'image' => Str::random(10) . '.jpg',
                'img_descrition' => Str::random(10) . '.jpg' . ' | ' . Str::random(10) . '.jpg',
                'description' => 'Love Lock Bridge is 3.6 km from the property, while Indochina Riverside Mall is 3.9 km away. The nearest airport is Da Nang International Airport, 7 km from London Hotel and Apartments Da Nang, and the property offers an airport shuttle service at a surcharge.',
                'note' => 'N/a',
                'action' => 1
            ]
        );
        DB::table('table_phong')->insert(
            [
                'id' => 4,
                'id_lp' => 4,
                'name' => 'Room for 2 people',
                'soLuong' => 2,
                'price' => 2000,
                'image' => Str::random(10) . '.jpg',
                'img_descrition' => Str::random(10) . '.jpg' . ' | ' . Str::random(10) . '.jpg',
                'description' => 'Love Lock Bridge is 3.6 km from the property, while Indochina Riverside Mall is 3.9 km away. The nearest airport is Da Nang International Airport, 7 km from London Hotel and Apartments Da Nang, and the property offers an airport shuttle service at a surcharge.',
                'note' => 'N/a',
                'action' => 2
            ]
        );
        DB::table('table_phong')->insert(
            [
                'id' => 5,
                'id_lp' => 5,
                'name' => 'Room for 2 people',
                'soLuong' => 2,
                'price' => 2000,
                'image' => Str::random(10) . '.jpg',
                'img_descrition' => Str::random(10) . '.jpg' . ' | ' . Str::random(10) . '.jpg',
                'description' => 'Love Lock Bridge is 3.6 km from the property, while Indochina Riverside Mall is 3.9 km away. The nearest airport is Da Nang International Airport, 7 km from London Hotel and Apartments Da Nang, and the property offers an airport shuttle service at a surcharge.',
                'note' => 'N/a',
                'action' => 3
            ]
        );
    }
}