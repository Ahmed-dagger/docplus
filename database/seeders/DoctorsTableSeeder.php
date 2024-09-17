<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeds/data/Providers/Sheet3-Table 1.csv');

        // Open the CSV file
        if (($file = fopen($filePath, 'r')) !== false) {
            $isFirstRow = true;
            // Loop through each row
            while (($row = fgetcsv($file)) !== false) {
                // Skip the header row
                if ($isFirstRow) {
                    $isFirstRow = false;
                    continue;
                }

                // Ensure the row has enough columns
                if (count($row) >= 22) {
                    // Validate numeric fields
                    $servicePriceOnline = is_numeric($row[20]) ? $row[20] : null;
                    $servicePriceHome = is_numeric($row[21]) ? $row[21] : null;

                    if ($row[3] === '1') {
                        // Insert into doctors table and get the doctor_id
                        $doctorId = DB::table('doctors')->insertGetId([
                            'name' => $row[4] ?? null,
                            'nickname' => $row[4] ?? null,
                            'location' => $row[11] ?? null,
                            'phone' => $row[12] ?? null,
                            'service_price_online' => $servicePriceOnline,
                            'service_price_home' => $servicePriceHome,
                        ]);
                    } elseif ($row[3] === '1-1') {
                        // Retrieve the doctor_id of the main doctor
                        $mainDoctor = DB::table('doctors')
                            ->where('name', $row[4] ?? null)
                            ->first();

                        $branchPrice = is_numeric($row[22]) ? (float)$row[22] : null;

                        // Insert into doctor_branches table with the retrieved doctor_id
                        if ($mainDoctor) {
                            DB::table('doctor_branches')->insert([
                                'name' => $mainDoctor->name,
                                'doctor_id' => $mainDoctor->id,
                                'location' => $row[11] ?? null,
                                'phone' => $row[12] ?? null,
                                'price' => $branchPrice,
                            ]);
                        }
                    }
                } else {
                    continue;
                }
            }

            // Close the CSV file
            fclose($file);
        } else {
            // Handle the error if the file cannot be opened
            throw new \Exception("Unable to open file at $filePath");
        }
    }
}
