<?php
namespace App\Imports;

use App\Models\Laboratory;
use App\Models\LaboratoryBranch;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaboratoriesImport implements ToModel, WithHeadingRow, WithMapping
{
    public function model(array $row)
    {
        // Create or update the Laboratory model based on the data in the row
        $laboratory = Laboratory::updateOrCreate(
            ['name' => $row['name']],
            [
                'work_from' => "12:00:PM",
                'work_to' => "12:00AM",
                'location' => $row['address']
            ]
        );

        // If the sheet has data for LaboratoryBranch, handle it here too
        if (isset($row['branch_name'])) {
            LaboratoryBranch::updateOrCreate(
                [
                    'laboratory_id' => $laboratory->id
                ],
                [
                    'location' => $row['address']
                ]
            );
        }

        return $laboratory;
    }

    /**
     * Map the columns from the Excel file to the model attributes.
     *
     * @param array $row
     * @return array
     */
    public function map($row): array
    {
        return [
            'name' => $row['name'],
            'location' => $row['address'],
        ];
    }
}
