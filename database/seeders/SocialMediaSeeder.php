<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'name' => "Facebook",
            'link' => "https://www.facebok.com/in/ayg%C3%BCn-ke%C3%A7e-142819194/",
            'icon' => "fa fa-facebook"
        ]);
    }
}
