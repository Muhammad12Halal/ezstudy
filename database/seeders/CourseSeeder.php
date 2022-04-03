<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/courses.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Course::create([
                    "user_id" => $data['1'],
                    "category_id" => $data['2'],
                    "level_id" => $data['3'],
                    "title" => $data['4'],
                    "slug" => $data['5'],
                    "description" => $data['6'],
                    "image" => $data['7'],
                    "video" => $data['8'],
                    "price" => $data['9'],
                    "duration" => $data['10'],
                    "status" => $data['11'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
