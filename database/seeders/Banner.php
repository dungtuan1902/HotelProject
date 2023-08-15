<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Banner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_banner')->insert(
            [
                'id' => 1,
                'name' => 'Banner 1',
                'image' => Str::random(10) . '.jpg',
                'link' => 'http://127.0.0.1:8000/typeroom',
                'action' => 1
            ]
        );
        DB::table('table_banner')->insert(
            [
                'id' => 2,
                'name' => 'Banner 2',
                'image' => Str::random(10) . '.jpg',
                'link' => 'http://127.0.0.1:8000/typeroom',
                'action' => 1
            ]
        );
        DB::table('table_banner')->insert(
            [
                'id' => 3,
                'name' => 'Banner 3',
                'image' => Str::random(10) . '.jpg',
                'link' => 'http://127.0.0.1:8000/typeroom',
                'action' => 1
            ]
        );
        DB::table('table_banner')->insert(
            [
                'id' => 4,
                'name' => 'Banner 4',
                'image' => Str::random(10) . '.jpg',
                'link' => 'http://127.0.0.1:8000/typeroom',
                'action' => 1
            ]
        );
        DB::table('table_banner')->insert(
            [
                'id' => 5,
                'name' => 'Banner 5',
                'image' => Str::random(10) . '.jpg',
                'link' => 'http://127.0.0.1:8000/typeroom',
                'action' => 1
            ]
        );
    }
}