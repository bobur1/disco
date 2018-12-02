<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
class OpenApiController extends Controller
{
   public function index(){
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
        $content=["volume"=>$volume, "quantity"=>$quantity, "weight"=>$weight];
       return response($content)
           ->header('Content-Type', 'application/json;charset=utf-8')
           ->header('X-Header-One', 'Header Value')
           ->header('X-Header-Two', 'Header Value');
   }
   public function price(){
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
       $content=["volume"=>$pvolume, "quantity"=>$pquantity, "weight"=>$pweight];
       return response($content)
           ->header('Content-Type', 'application/json;charset=utf-8')
           ->header('X-Header-One', 'Header Value')
           ->header('X-Header-Two', 'Header Value');
   }
}
