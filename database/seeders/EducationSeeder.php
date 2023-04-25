<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'education_year' => "2012 - 2017",
            'school_name' => "Mehmet Akif Ersoy Üniversitesi",
            'department' => "Management Information Systems",
            'description' => "Bilgisayar alanında üstüne yok.",
            'degree' =>"3.00",

        ]);

    }
}
