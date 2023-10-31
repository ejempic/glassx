<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class ExportQuotation implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        // Retrieve your data (e.g., from a database)
        $data = User::all();

        return $data;
    }

    public function headings(): array
    {
        return [
            'Column 1',
            'Column 2',
            'Column 3',
        ];
    }
    public function export()
    {
        // Define the path to your existing Excel template file
        $existingTemplatePath = 'app/lib/Template.xlsx';

        // Define the path for the new file you want to create
        $newFilePath = 'app/lib/Template_copy.xlsx';

        // Copy the existing Excel file to a new location with a new name
        Storage::copy($existingTemplatePath, $newFilePath);

        // Export the data to the new file using the copied template
        return Excel::download(new ExportQuotation, $newFilePath);
    }
}
