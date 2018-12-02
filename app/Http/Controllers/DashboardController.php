<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SleepingOwl\Admin\Http\Controllers\AdminController  as Controller;
use Auth;
use AdminSection;
class DashboardController extends Controller
{
    public function index(Request $request){
        $jsonurl = "http://www.meteo.uz/api/v2/climate_ru.json";
        $json = file_get_contents($jsonurl);
        $weather = json_decode($json, true);
        $weth = array();
        if(isset($weather)){
            foreach ($weather as $data){
                if($data['city'] == 'Ташкент'){
                    $weth[]=$data;
                }
            }
        }
        $title = "Вес";
        $tweight = array();
        $value = "weight";

        if(!empty($request->type)){
            $value = $request->type;
            if($value == 'weight'){
                $title = 'Вес';
            }elseif($value == 'volume'){
                $title = "Обьем";
            }else{
                $title = "Количество";
            }
        }


        if(Auth::user()->isSuperAdmin()){
            $weight=Purchase::whereNotNull('weight')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(weight) as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $quantity=Purchase::whereNotNull('quantity')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(quantity) as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $volume=Purchase::whereNotNull('volume')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(volume) as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
                //dd(json_encode($weight));

            $pweight=Purchase::whereNotNull('weight')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(weight*cost)/100 as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $pquantity=Purchase::whereNotNull('quantity')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(quantity*cost) as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $pvolume=Purchase::whereNotNull('volume')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(volume*cost) as value')
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();


            for ($i=0; $i<12; $i++){
                $product = Purchase::whereNotNull('weight')
                    ->groupBy('product_name');
                if($value == 'weight') {
                    $product = $product->selectRaw('product_name as name, sum(weight)/100 as value');
                }else{
                    $product = $product->selectRaw('product_name as name, sum('.$value.') as value');
                }
                $product= $product->whereRaw('MONTH(created_at) ='.($i+1))
                    ->orderBy('value', 'desc')
                    ->first();
                $tweight[] = $product;


            }




            return $this->admin->template()->view('dashboard.index',
                [   'title' => 'Admin\'s room',
                    'content' => '',
                    'breadcrumbKey' => 'breadcrumbKey',

                    'weight' => $weight,
                    'pweight' => $pweight,
                    'quantity' => $quantity,
                    'pquantity' => $pquantity,
                    'volume' => $volume,
                    'weth' => $weth,
                    'pvolume' => $pvolume,
                    'tweight' => $tweight,
                    'titler'=>$title
                ]);
        }else{
            $weight=Purchase::whereNotNull('weight')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(weight) as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $quantity=Purchase::whereNotNull('quantity')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(quantity) as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $volume=Purchase::whereNotNull('volume')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(volume) as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            //dd(json_encode($weight));
            $pweight=Purchase::whereNotNull('weight')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(weight*cost)/100 as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $pquantity=Purchase::whereNotNull('quantity')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(quantity*cost) as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            $pvolume=Purchase::whereNotNull('volume')
                ->groupBy('product_name')
                ->selectRaw('product_name as name, sum(volume*cost) as value')
                ->where('company', Auth::user()->company)
                ->limit(5)
                ->orderBy('value', 'desc')
                ->get()
                ->toArray();
            for ($i=0; $i<12; $i++){
                $product = Purchase::whereNotNull('weight')
                    ->groupBy('product_name');
                if($value == 'weight') {
                    $product = $product->selectRaw('product_name as name, sum(weight)/100 as value');
                }else{
                    $product = $product->selectRaw('product_name as name, sum('.$value.') as value');
                }
                $product= $product->whereRaw('MONTH(created_at) ='.($i+1))
                    ->where('company', Auth::user()->company)
                    ->orderBy('value', 'desc')
                    ->first();
                $tweight[] = $product;


            }

            return $this->admin->template()->view('dashboard.index',
                ['title' => 'Manager\'s room',
                    'content' => '',
                    'breadcrumbKey' => 'breadcrumbKey',
                    'weight' => $weight,
                    'quantity' => $quantity,
                    'volume' => $volume,
                    'pweight' => $pweight,
                    'pquantity' => $pquantity,
                    'pvolume' => $pvolume,
                    'tweight' => $tweight,
                    'titler'=>$title
                    ]);
        }

    }
}
