<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PredictionController extends Controller
{
    public function index(){
        $data = Purchase::where( 'created_at', '>', \Carbon\Carbon::now()->subMonths(4))->orderBy('product_name')->orderBy('created_at')->get();
        $prediction = array();
        $diff = 0;
        $name = "";
        $count = -1;
        $num = 0;
        $diff_sum=0;
        foreach($data as $key=>$arr){
            if($name != $data[$key]->name){
                $count ++;
                if($num>0){
                $prediction[$count]['amount']= $diff/$num;
                }
                $name == $arr->name;
                $prediction[$count]['name']= $name;
                $num = 0;
                $diff_sum=0;



            }
            if($key != sizeof($data) and $name == $data[$key+1]->name) {
                $diff = (intval($arr->weight) + intval($arr->volume) + intval($arr->quantity)) - (intval($data[$key+1]->weight) + intval($data[$key+1]->volume) + intval($data[$key+1]->quantity));
                $num++;
                $diff_sum+= $diff;
            }

        }
        dd( $prediction);
    }
}
