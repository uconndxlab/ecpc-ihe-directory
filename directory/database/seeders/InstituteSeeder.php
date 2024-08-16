<?php

namespace Database\Seeders;

use App\Models\Institute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = database_path('seeders/programs.csv');
        // Open the CSV file and loop through the rows.

        $file = fopen($csv, 'r');

        while (($data = fgetcsv($file)) !== false) {
            // Skip the header row.
            if ($data[0] === 'State') {
                continue;
            }

            Institute::create([
               'state' => $data[0],
                'ihe' => $data[1],
                'program_title' => $data[2],
                'level_of_degree' => $data[3],
                'format' => $data[4],
                'alternate_route_to_certification' => $data[5],
                'category_of_credentialing' => $data[6],
                'url_for_program' => $data[7],
            ]);
        }

    }
}
