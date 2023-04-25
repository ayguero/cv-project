<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aygün Keçe',
           'email' => 'aygunkece@gmail.com',
           'password' => bcrypt('ayguero'),
            'job' => 'Software',
            'profile_image' => "imagepath",
            'address' => 'Söke'
        ]);
    }
}
