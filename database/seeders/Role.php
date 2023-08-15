<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_role')->insert(
            [
                [
                    'id'=>1,
                    'name' => 'Admin',
                    'color'=>'bg-gradient-danger',
                    'is_disabled'=>1
                ],
                [
                    'id'=>2,
                    'name' => 'Client',
                    'color'=>'bg-gradient-success',
                    'is_disabled'=>1
                ],
                [
                    'id'=>3,
                    'name' => 'Poster',
                    'color'=>'bg-gradient-primary',
                    'is_disabled'=>1
                ],
                [
                    'id'=>4,
                    'name' => 'Staff',
                    'color'=>'bg-gradient-warning',
                    'is_disabled'=>1
                ],
            ]
        );
    }
}