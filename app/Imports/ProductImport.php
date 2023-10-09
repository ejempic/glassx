<?php

namespace App\Imports;

use App\Models\ProductProfile;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductImport implements WithMultipleSheets, SkipsUnknownSheets
{

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            ProductProfile::STANDARD => new StandardImport(),
            ProductProfile::DELUXE => new DeluxeImport(),
            ProductProfile::PREMIUM => new PremiumImport(),
            ProductProfile::LUXURY => new LuxuryImport(),
            ProductProfile::SLIM_PROFILE => new SlimProfileImport(),
            ProductProfile::CURTAIN_WALL => new CurtainWallsImport(),
            ProductProfile::FRAMELESS => new FramelessImport(),
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        info("Sheet {$sheetName} was skipped. Please rename to correct format.");
    }
}
