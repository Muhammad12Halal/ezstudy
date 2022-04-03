<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CourseCategorySeeder::class,
            CourseLevelSeeder::class,
            CourseSeeder::class,
            ProfileSeeder::class,
            EventSeeder::class,
        ]);
    }
}
