<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Discount;
use App\Models\Discount_List;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientApiController extends Controller
{
    public function login(Request $request){
        $password = $request->password;
        $email = $request->email;
        $client = Client::where('email', $email)->first();
        if(!empty($client) && Hash::check($password, $client->password)){
            $content = ["success"=>"OK",
                        "uid"=>$client->uid];
        }else{
            $content = ["error"=>"Wrong email or password!"];
        }
        return response($content)
            ->header('Content-Type', 'application/json;charset=utf-8')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
    }
    public function register(Request $request){
        $password = bcrypt($request->password);
        $email = $request->email;
        $client = Client::where('email', $email)->first();
        if(!empty($client)){
            $content = ["error"=>"The user already registered"];
            return response($content)
                ->header('Content-Type', 'application/json;charset=utf-8')
                ->header('X-Header-One', 'Header Value')
                ->header('X-Header-Two', 'Header Value');
        }
        $client = new Client;

        $client->email = $email;
        $client->password = $password;
        $client->uid = rand(1, 10000000);
        $client->save();
        $content = ["success"=>"OK"];
        return response($content)
            ->header('Content-Type', 'application/json;charset=utf-8')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
    }
    public function information(Request $request){
        $client = Client::where('uid', $request->uid)->first();
        if(empty($client)){
            $content = ["error"=>"No access"];
            return response($content)
                ->header('Content-Type', 'application/json;charset=utf-8')
                ->header('X-Header-One', 'Header Value')
                ->header('X-Header-Two', 'Header Value');
        }
        $purchase = Purchase::where('user_ID', $request->uid)->get()->toArray();
        $content = ["success"=>"OK",
                    "email"=>$client->email,
                    "purchases"=>$purchase];

        return response($content)
            ->header('Content-Type', 'application/json;charset=utf-8')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
    }

    public function sale(Request $request){

        $sale = Discount::get()->toArray();
        $content = ["success"=>"OK",
            "sales"=>$sale];
        return response($content)
            ->header('Content-Type', 'application/json;charset=utf-8')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
    }

    public function discount(Request $request){
        $client = Client::where('uid', $request->uid)->first();
        if(empty($client)){
            $content = ["error"=>"No access"];
            return response($content)
                ->header('Content-Type', 'application/json;charset=utf-8')
                ->header('X-Header-One', 'Header Value')
                ->header('X-Header-Two', 'Header Value');
        }
        $company = Purchase::where('user_ID', $request->uid)
            ->selectRaw('company, sum(cost) as amount')
            ->groupBy('company')
            ->get()->toArray();
        $discount_info=array();
        foreach ($company as $key=>$comp){
            $info = Discount_List::where('company', $comp['company'])->selectRaw('MAX(max_amount) as maximum')->first();
            $maximum = $info->maximum;
            $amount = $comp['amount']%$maximum;

            $discount =  Discount_List::where('company', $comp['company'])
                ->where('min_amount','<=',$amount)
                ->where('max_amount','>=',$amount)
                ->first();

            $next_discount = Discount_List::where('company', $comp['company'])
                ->where('number','>',$discount->number)->first();

            $discount_info[$key]['company']=$comp['company'];
            $discount_info[$key]['amount']=$comp['amount'];
            $discount_info[$key]['discount']=$discount->number;
            $discount_info[$key]['min_amount']=$discount->min_amount;
            $discount_info[$key]['max_amount']=$discount->max_amount;
            if(!empty($next_discount)) {
                $discount_info[$key]['next_discount'] = $next_discount->number;
            }else{
                $discount_info[$key]['next_discount'] = "You have reached the maximum!";
            }

        }
        $content = ["success"=>"OK",
            "discount-list"=>$discount_info];
        return response($content)
            ->header('Content-Type', 'application/json;charset=utf-8')
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');

    }

}
