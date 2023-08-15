<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'username' => 'Test User',
            'phone' => '0382610702',
            'address' => 'Duc Giang - Hoai Duc - Ha Noi',
            'email' => 'test@example.com',
            'password'=> Hash::make('123'),
            'image'=>Str::random(10).'.jpg',
            'role'=>1
        ]);
        $this->call([
            posts::class
        ]);
    }
}