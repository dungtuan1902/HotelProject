<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KhuyenMai extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_khuyen_mai')->insert(
            [
                'id' => 1,
                'name' => '50% off',
                'code' => Str::random(10),
                'value' => 50,
                'time' => '2023-07-23',
                'note' => 'Khuyen mai uu dai '
            ]
        );
        DB::table('table_khuyen_mai')->insert(
            [
                'id' => 2,
                'name' => '50% off',
                'code' => Str::random(10),
                'value' => 50,
                'time' => '2023-07-23',
                'note' => 'Khuyen mai uu dai '
            ]
        );
        DB::table('table_khuyen_mai')->insert(
            [
                'id' => 3,
                'name' => '50% off',
                'code' => Str::random(10),
                'value' => 50,
                'time' => '2023-07-23',
                'note' => 'Khuyen mai uu dai '
            ]
        );
        DB::table('table_khuyen_mai')->insert(
            [
                'id' => 4,
                'name' => '50% off',
                'code' => Str::random(10),
                'value' => 50,
                'time' => '2023-07-23',
                'note' => 'Khuyen mai uu dai '
            ]
        );
        DB::table('table_khuyen_mai')->insert(
            [
                'id' => 5,
                'name' => '50% off',
                'code' => Str::random(10),
                'value' => 50,
                'time' => '2023-07-23',
                'note' => 'Khuyen mai uu dai '
            ]
        );
    }
}