<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeRoom extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_loai_phong')->insert([
            'id' => 1,
            'name' => 'Presidential',
            'image' => Str::random(10) . '.jpg'
        ]);
        DB::table('table_loai_phong')->insert([
            'id' => 2,
            'name' => 'VIP room',
            'image' => Str::random(10) . '.jpg'
        ]);
        DB::table('table_loai_phong')->insert([
            'id' => 3,
            'name' => 'Business room',
            'image' => Str::random(10) . '.jpg'
        ]);
        DB::table('table_loai_phong')->insert([
            'id' => 4,
            'name' => 'Budget room',
            'image' => Str::random(10) . '.jpg'
        ]);
        DB::table('table_loai_phong')->insert([
            'id' => 5,
            'name' => 'Family\'s room',
            'image' => Str::random(10) . '.jpg'
        ]);
    }
}