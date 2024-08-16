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
            if ($data[0] === 'state_name') {
                continue;
            }

            Institute::create([
                'state_name' => $data[0],
                'ihe_name' => $data[1],
                'program_title' => $data[2],
                'program_type' => $data[3],
                'level_of_degree' => $data[4],
                'format' => $data[5],
                'alternate_route_to_certification' => $data[6],
                'category_of_credentialing' => $data[7],
                'url_for_program' => $data[8],
            ]);
        }

    }
}
