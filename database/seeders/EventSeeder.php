<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/events.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Event::create([
                    "title" => $data['1'],
                    "image" => $data['2'],
                    "location" => $data['3'],
                    "date" => $data['4'],
                    "time" => $data['5'],
                    "desc" => $data['6'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
