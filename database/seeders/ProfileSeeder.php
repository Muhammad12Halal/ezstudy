<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/profiles.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Profile::create([
                    "user_id" => $data['1'],
                    "address" => $data['2'],
                    "phone" => $data['3'],
                    "image" => $data['4'],
                    "facebook" => $data['5'],
                    "twitter" => $data['6'],
                    "instagram" => $data['7'],
                    "youtube" => $data['8'],
                    "about" => $data['9'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
