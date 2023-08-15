<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HoaDon extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_hoa_don')->insert([
            'id'=>1,
            'id_phong'=>1,
            'id_user'=>1,
            'id_km'=>1,
            'soLuong'=>2,
            'time'=>'2023-07-29',
            'pttt'=>1,
            'total'=>2000,
            'status'=>2,
        ]);
        DB::table('table_hoa_don')->insert([
            'id'=>2,
            'id_phong'=>2,
            'id_user'=>2,
            'id_km'=>1,
            'soLuong'=>2,
            'time'=>'2023-07-29',
            'pttt'=>1,
            'total'=>2000,
            'status'=>1,
        ]);
        DB::table('table_hoa_don')->insert([
            'id'=>3,
            'id_phong'=>3,
            'id_user'=>3,
            'id_km'=>1,
            'soLuong'=>2,
            'time'=>'2023-07-29',
            'pttt'=>1,
            'total'=>2000,
            'status'=>3,
        ]);
        DB::table('table_hoa_don')->insert([
            'id'=>4,
            'id_phong'=>4,
            'id_user'=>4,
            'id_km'=>1,
            'soLuong'=>2,
            'time'=>'2023-07-29',
            'pttt'=>1,
            'total'=>2000,
            'status'=>1,
        ]);
        DB::table('table_hoa_don')->insert([
            'id'=>5,
            'id_phong'=>5,
            'id_user'=>5,
            'id_km'=>1,
            'soLuong'=>2,
            'time'=>'2023-07-29',
            'pttt'=>1,
            'total'=>2000,
            'status'=>4,
        ]);
    }
}
