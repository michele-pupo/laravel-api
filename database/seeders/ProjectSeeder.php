<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(Faker $faker): void
    // {
        

    //     for($i = 0; $i < 10; $i++){
    //         $newProject = new Project();
    //         $newProject->name = $faker->word();
    //         $newProject->description = $faker->paragraph();
    //         $newProject->project_image = $faker->imageUrl(640, 480, 'a website', true);;
    //         $newProject->used_technologies = $faker->words(rand(1, 3), true);
    //         $fakerDate = $faker->dateTimeThisYear();
    //         $formattedDate = $fakerDate->format('Y-m-d');

    //         $newProject->project_date = $formattedDate;
    //         $newProject->link_github = $faker->url();
    //         $newProject->save();
    //     }
    // }
}
