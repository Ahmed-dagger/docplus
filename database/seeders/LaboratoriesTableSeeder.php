<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LaboratoriesImport;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Define the path to the Excel file
        $filePath = database_path('seeds/data/laboratories.xlsx'); // Adjust the path as needed

        // Import the file
        Excel::import(new LaboratoriesImport, $filePath);

        $this->command->info('Laboratories and branches imported successfully.');

    }
}
