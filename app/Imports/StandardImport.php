<?php

namespace App\Imports;

use App\Models\Frame;
use App\Models\Glass;
use App\Models\GlassUpgrade;
use App\Models\Handle;
use App\Models\ProductCombinationPrice;
use App\Models\ProductType;
use App\Models\Upgrade;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StandardImport implements ToArray, WithHeadingRow
{
    /**
     * @param array $rows
     * @return void
     */
    public function array(array $rows): void
    {
        [$upgrades, $productTypeGroups, $glassUpgrades] = $this->importRows($rows);

        $this->syncUpgrades($productTypeGroups, $upgrades, $glassUpgrades);
    }

    /**
     * @param $rows
     * @return array[]
     */
    private function importRows($rows)
    {
        $upgrades = [];
        $oldUpgrade = [1];
        $productTypes = [];
        $glassUpgrades = [];
        foreach ($rows as $row) {
            if (!$row['type']) {
                continue;
            }

            /**
             * Get the end of the product type to base price via using the upgrades checking
             * if there is a new upgrade will create a new group for upgrades.
             */
            if ($oldUpgrade == null && $row['upgrades'] != null) {
                $upgradeGroups[] = $upgrades;
                $productTypesGroups[] = $productTypes;
                $upgrades = [];
                $productTypes = [];
            }

            $upgrade = $this->upgrades($row);
            $productType = $this->createPrice($row);
            $glassUpgrade = $this->glassUpgrades($row);

            if ($productType) {
                $productTypes[$productType->id] = $productType ;
            }

            if ($upgrade) {
                $upgrades[] = $upgrade->id;
            }

            if ($glassUpgrade) {
                $glassUpgrades[] = $glassUpgrade->id;
            }


            $oldUpgrade = $row['upgrades'];
        }

        $upgradeGroups[] = $upgrades;
        $productTypesGroups[] = $productTypes;

        return [$upgradeGroups, $productTypesGroups, $glassUpgrades];
    }


    private function syncUpgrades($productTypeGroups, $upgrades, $glassUpgrades)
    {
        foreach ($productTypeGroups as $key => $productTypes) {
            foreach ($productTypes as $productType) {
                /** @var ProductType $productType */
                $productType->upgrade()->sync($upgrades[$key]);
                $productType->glassUpgrade()->sync($glassUpgrades);
            }
        }
    }

    private function upgrades(array $row)
    {
        if ($row['upgrades'] && $row['flat'] && $row[7]) {

            $upgrade = Upgrade::where(['name' => trim($row['upgrades'])])->first();
            if(!$upgrade){
                return Upgrade::create([
                    'name' => trim($row['upgrades']),
                    'add_on' => trim($row['flat']),
                    'unit' => Upgrade::getUnit($row[7])
                ]);
            }
            $upgrade->update([
                'add_on' => trim($row['flat']),
                'unit' => Upgrade::getUnit($row[7])
            ]);
            return $upgrade;
        }
    }

    private function glassUpgrades(array $row)
    {
        if ($row['glass_upgrade_available_on_all_types'] && $row['bp_upgrade']) {

            $glassUpgrade = GlassUpgrade::where(['name' => trim($row['glass_upgrade_available_on_all_types'])])->first();
            if(!$glassUpgrade){
                return GlassUpgrade::create([
                    'name' => trim($row['glass_upgrade_available_on_all_types']),
                    'multiplier' => trim($row['bp_upgrade'])
                ]);
            }
            $glassUpgrade->update(['multiplier' => trim($row['bp_upgrade'])]);
            return $glassUpgrade;
        }

    }

    private function createPrice(array $row)
    {
        $productType = ProductType::firstOrCreate(['name' => $row['type']]);
        $handle = Handle::firstOrCreate(['product_type_id' => $productType->id, 'name' => $row['handle']]);
        $frame = Frame::firstOrCreate(['product_type_id' => $productType->id, 'name' => $row['frame']]);
        $glass = Glass::firstOrCreate(['product_type_id' => $productType->id, 'name' => $row['default_glass']]);

        ProductCombinationPrice::checkAndUpdateOrCreateItem([
            'product_type_id' => $productType->id,
            'frame_id' => $frame->id,
            'glass_id' => $glass->id,
            'handle_id' => $handle->id,
        ], [
            'base_price' => $row['base_price']
        ]);

        return $productType;
    }

    public function headingRow(): int
    {
        return 3;
    }

}
