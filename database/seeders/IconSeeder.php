<?php

namespace Database\Seeders;

use App\Models\Icons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Icons::create([
            'icon_name' => "Linkedin",
            'icon_class' => "fa fa-linkedin"
            ]);

        Icons::create([
            'icon_name' => "Facebook",
            'icon_class' => "fa fa-facebook"
        ]);

        Icons::create([
            'icon_name' => "Twitter",
            'icon_class' => "fa fa-twitter"
        ]);

        Icons::create([
            'icon_name' => "Github",
            'icon_class' => "fa fa-github"
        ]);
    }
}
