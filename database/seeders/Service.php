<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Service extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service')->insert(
            [
                'name'=>'Free Wifi',
                'image'=>'abc.jpg',
                'note'=>'Free wifi for all room'
            ]
        );
    }
}
