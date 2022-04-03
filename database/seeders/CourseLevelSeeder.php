<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class CourseLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Basic',
            'slug' => 'basic',
        ]);

        Level::create([
            'name' => 'Mid',
            'slug' => 'mid',
        ]);

        Level::create([
            'name' => 'High',
            'slug' => 'high',
        ]);

        Level::create([
            'name' => 'Advanced',
            'slug' => 'advanced',
        ]);
    }
}
