<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Web Development',
            'slug' => '	web-development-DvHzn8kgeg',
            'image' => '1648905400.png',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design-3WI1DDsUTv',
            'image' => '1648905423.png',
        ],);

        Category::create([
            'name' => 'Database Development',
            'slug' => 'database-development-hhGz5dS0bG',
            'image' => '1648905489.png',
        ]);
    }
}
