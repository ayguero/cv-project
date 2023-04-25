<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'company_name' => "Robotus Mühendislik",
            'task_name' => "Tasarım ve Arge Mühendisi",
            'description' => "Robotik teknolojileri üzerine 3d tasarımlar ve yazılım iyileştirmeleri üzerine çalıştım. Yenilikçi robotik yapay zeka çözümleri üzerine müşteri desteklerinde bulundum. ",
            'date' =>"2017 - 2023",

        ]);
    }
}
