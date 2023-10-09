<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use App\Models\Glass;
use App\Models\GlassUpgrade;
use App\Models\Handle;
use App\Models\ProductCombinationPrice;
use App\Models\ProductType;
use App\Models\Quotation;
use App\Models\Upgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data  = [
            'product_types' => ProductType::all()->toArray()
        ];
        return view('quotation',$data);
    }

    public function getPrice(Request $request)
    {
        $data = [];
        $query = json_decode($request->input('query'));
        $productCombinationPrice=[];
        if(isset($query->type)){

            $productCombinationPrice = ProductCombinationPrice::where([
                'product_type_id' => (int)$query->type,
                'handle_id' => (int)$query->handle,
                'glass_id' => (int)$query->glass,
                'frame_id' => (int)$query->frame,
            ])->first();

            if($productCombinationPrice){
                $sqm = $query->height * $query->width;
                $price = $sqm * $productCombinationPrice->base_price;
                $data['base_price'] = $price;
            }

        }


        $upgradeModel = Upgrade::find((int) $query->upgrade);
        if($upgradeModel){
            $data['add_on'] = $upgradeModel->add_on;
            $data['unit'] = $upgradeModel->getPriceUnit();

            if($upgradeModel->unit == Upgrade::SQM){
                $sqm = $query->height * $query->width;
                $price = $sqm * $upgradeModel->add_on;
            }else{
                $price = $query->quantity * $upgradeModel->add_on;
            }

            $data['upgrade_price'] = $price;
        }

        if(isset($query->upgrade_glass)){

            $glassUpgradeModel = GlassUpgrade::find((int) $query->upgrade_glass);
            if($glassUpgradeModel && $productCombinationPrice){
                $data['glass_multiplier'] = $glassUpgradeModel->multiplier;
                $data['glass_price'] = $productCombinationPrice->base_price * ($glassUpgradeModel->multiplier / 100);
            }
        }


        return response()->json($data);
        dd($quotation->first(),$quotation->toSql(),$quotation->getBindings());
    }

    public function getQuery(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type');
        $productType = $request->input('product_type');

        $queryData = [];
        if(!empty($productType)){
            $queryData = ['product_type_id'=>$productType];
        }

        if(Quotation::PRODUCT_TYPE == $type){
            unset($queryData['product_type_id']);
        }

        $model = match ($type) {
            Quotation::HANDLE => Handle::query(),
            Quotation::UPGRADE => Upgrade::join('product_type_upgrades', 'upgrades.id','=','product_type_upgrades.upgrade_id')
                ->select('upgrades.*'),
            Quotation::UPGRADE_GLASS => GlassUpgrade::join('product_type_glass_upgrades', 'glass_upgrades.id','=','product_type_glass_upgrades.glass_upgrade_id')
                ->select('glass_upgrades.*'),
            Quotation::GLASS => Glass::query(),
            Quotation::FRAME => Frame::query(),
            default => ProductType::query(),
        };
        if(!empty($queryData)){
            $model->where($queryData);
        }

        if(Quotation::PRODUCT_TYPE == $type){
            $model->where('name', 'like', "%$query%");
        }


        $suggestions = $model->get();

        return response()->json(['suggestions' => $suggestions,'sql' => $model->toSql(),'binding'=>$model->getBindings()]);
    }
}
