<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'title' => "Web Sitesi",
            'tags' => "php,laravel",
            'about' => "Aygun web site tasarım",
            'description' => "laravel ile web sitesi geliştirildi.",
            'website' => "www.aygunkece.com",
            'keywords' => "php"
        ]);
    }
}
