<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Frame;
use App\Models\Glass;
use App\Models\Handle;
use App\Models\ProductCombinationPrice;
use App\Models\ProductType;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductManagementController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /*
        'product_type_id',
        'frame_id',
        'glass_id',
        'handle_id',*/
        $prices = ProductCombinationPrice::query()
            ->join('product_types','product_combination_prices.product_type_id','=','product_types.id')
            ->join('frames','product_combination_prices.frame_id','=','frames.id')
            ->join('glasses','product_combination_prices.glass_id','=','glasses.id')
            ->join('handles','product_combination_prices.handle_id','=','handles.id')
            ->leftJoin('product_type_upgrades','product_types.id','=','product_type_upgrades.product_type_id')
            ->leftJoin('upgrades','product_type_upgrades.upgrade_id','=','upgrades.id')
            ->leftJoin('product_type_glass_upgrades','product_types.id','=','product_type_glass_upgrades.product_type_id')
            ->leftJoin('glass_upgrades','product_type_glass_upgrades.glass_upgrade_id','=','glass_upgrades.id')
            ->select([
                'product_combination_prices.id',
                'product_types.name as product_type',
                'frames.name as frame',
                'glasses.name as glass',
                'handles.name as handle',
                'product_combination_prices.base_price',
                'upgrades.name as upgrade',
                'upgrades.add_on as add_on',
                'upgrades.unit as unit',
                'glass_upgrades.name as glass_upgrade',
                'glass_upgrades.multiplier as multiplier',
                ])
            ->latest('product_combination_prices.id')
            ->get()
        ;

        return view('product_management.index', compact('prices'));
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        $data = Excel::import(new ProductImport(), $file);

        return redirect()->back()->with('success', 'Successfully Imported');
    }
}
