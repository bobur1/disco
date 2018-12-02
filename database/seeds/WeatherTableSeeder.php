<?php

use Illuminate\Database\Seeder;
use App\Models\Purchase;
class WeatherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       $product = [   ];
       $start = new \Carbon\Carbon('2018-01-01 00:00');

       $faker = \Faker\Factory::create();
       $check = rand(10,100);
       $filial = rand(1,10);
       $date = $start;
       for ($i = 0; $i < 90; $i++) {
            if(! (($i+1)%3) ){
            	$check = rand(10,100);	
            	$date = $start->addDays(2)->addHours(2);
            	$filial = rand(1,10);
            }
       		$date->format('Y-m-d H:i:s');
       		$offst = rand(1, 100)% sizeof($product);
            Purchase::create([
                'user_ID' => 4365678,
                'product_category' => $product[$offst]['category'],
                'product_name' => $product[$offst]['product'],
                'company' => 'Korzinka',
                'filial' => $filial,
                'check_number' => $check,
                'quantity' => $product[$offst]['quantity'],
                'weight' => $product[$offst]['weight'],
                'created_at' => $date,
                'updated_at' => $date,
                'volume' => $product[$offst]['volume']
            ]);
        }
    }
}
