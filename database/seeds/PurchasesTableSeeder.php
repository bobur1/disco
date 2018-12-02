<?php

use Illuminate\Database\Seeder;
use App\Models\Purchase;
class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       $product = [
        [
        'category'=>'Хлебобулочные изделия',
        'product'=>'Буханка',
        'quantity'=>rand(1,10),
        'weight' => '',
        'cost' => 1000,
        'volume' => ''
        ], 
        [
        'category'=>'Хлебобулочные изделия',
        'product'=>'Лепёшка',
        'quantity'=>rand(1,10),
        'weight' => '',
        'cost' => 1200,
        'volume' => ''
        ], 
        [
        'category'=>'Хлебобулочные изделия',
        'product'=>'Нарезанный хлеб',
        'quantity'=>rand(1,10),
        'weight' => '',
        'cost' => 1500,
        'volume' => ''
        ], 
        [
        'category'=>'Молочные продукты',
        'product'=>'Молоко',
        'quantity'=>'',
        'weight' => '',
        'cost' => 3000,
        'volume' => rand(1,5)
        ],
        [
        'category'=>'Молочные продукты',
        'product'=>'Творог',
        'quantity'=>'',
        'cost' => 5000,
        'weight' => rand(100,500),
        'volume' => ''
        ],        
        [
        'category'=>'Молочные продукты',
        'product'=>'Сливки',
        'quantity'=>'',
        'cost' => 8000,
        'weight' => rand(100,500),
        'volume' => ''
        ], 
        [
        'category'=>'Молочные продукты',
        'product'=>'Кислое молоко',
        'quantity'=>'',
        'cost' => 3000,
        'weight' => '',
        'volume' => rand(1,5)
        ], 
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Помидор',
        'quantity'=>'',
        'cost' => 3500,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Картошка',
        'quantity'=>'',
        'cost' => 1500,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Луковица',
        'quantity'=>'',
        'cost' => 1500,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Огурец',
        'quantity'=>'',
        'cost' => 2000,
        'weight' => rand(100,5000),
        'volume' => ''
        ],  
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Яблоко',
        'quantity'=>'',
        'cost' => 2500,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Груша',
        'quantity'=>'',
        'cost' => 3000,
        'weight' => rand(100,5000),
        'volume' => ''
        ],
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Банан',
        'quantity'=>'',
        'cost' => 9000,
        'weight' => rand(100,5000),
        'volume' => ''
        ],  
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Апельсин',
        'quantity'=>'',
        'cost' => 8500,
        'weight' => rand(100,5000),
        'volume' => ''
        ],  
        [
        'category'=>'Фрукты и Овощи',
        'product'=>'Лимон',
        'quantity'=>'',
        'cost' => 5000,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Деликатесы',
        'product'=>'Замороженный цыпленок',
        'quantity'=>'',
        'cost' => 18000,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Деликатесы',
        'product'=>'Замароженная пицца',
        'quantity'=>'',
        'cost' => 15000,
        'weight' => rand(100,2000),
        'volume' => ''
        ], 
        [
        'category'=>'Деликатесы',
        'product'=>'Замароженная кукуруза',
        'quantity'=>'',
        'cost' => 3000,
        'weight' => rand(100,1000),
        'volume' => ''
        ],
        [
        'category'=>'Деликатесы',
        'product'=>'Замороженные пельмени',
        'quantity'=>'',
        'cost' => 6000,
        'weight' => rand(100,5000),
        'volume' => ''
        ],
        [
        'category'=>'Деликатесы',
        'product'=>'Замароженная рыба',
        'quantity'=>'',
        'cost' => 22000,
        'weight' => rand(100,7000),
        'volume' => ''
        ],
        [
        'category'=>'Деликатесы',
        'product'=>'Замароженная клубника',
        'quantity'=>'',
        'cost' => 7000,
        'weight' => rand(100,5000),
        'volume' => ''
        ], 
        [
        'category'=>'Деликатесы',
        'product'=>'Торт',
        'quantity'=>'',
        'cost' => 45000,
        'weight' => rand(100,5000),
        'volume' => ''
        ],
        [
        'category'=>'Чистящие средства',
        'product'=>'Мыло',
        'quantity'=>rand(1,10),
        'cost' => 3500,
        'weight' => '',
        'volume' => ''
        ], 
        [
        'category'=>'Чистящие средства',
        'product'=>'Шампунь',
        'quantity'=>rand(1,10),
        'cost' => 12500,
        'weight' => '',
        'volume' => ''
        ], 
        [
        'category'=>'Чистящие средства',
        'product'=>'Чистолин (порошок)',
        'quantity'=>'',
        'cost' => 30,
        'weight' => rand(100,1000),
        'volume' => ''
        ],          
        [
        'category'=>'Чистящие средства',
        'product'=>'Стиральный порошок',
        'quantity'=>'',
        'cost' => 410,
        'weight' => rand(100,1000),
        'volume' => ''
        ], 
        [
        'category'=>'Чистящие средства',
        'product'=>'Моющее страдство для кухни',
        'quantity'=>'',
        'cost' => 250,
        'weight' => rand(100,1000),
        'volume' => ''
        ],
         [
         'category'=>'Напитки и соки',
         'product'=>'Кока-кола',
         'quantity'=>'',
         'weight' => '',
         'cost' => 6500,
         'volume' => rand(1, 3)
        ], 
        [
         'category'=>'Напитки и соки',
         'product'=>'Пепси',
         'quantity'=>'',
         'weight' => '',
         'cost' => 6500,
         'volume' => rand(1, 3)
        ], 
        [
         'category'=>'Напитки и соки',
         'product'=>'Спрайт',
         'quantity'=>'',
         'weight' => '',
         'cost' => 6000,
         'volume' => rand(1, 3)
        ], 
        [
         'category'=>'Напитки и соки',
         'product'=>'Фанта',
         'quantity'=>'',
         'weight' => '',
         'cost' => 6500,
         'volume' => rand(1, 3)
        ], 
        [
         'category'=>'Напитки и соки',
         'product'=>'Апельсиновый сок',
         'quantity'=>'',
         'weight' => '',
         'cost' => 7500,
         'volume' => rand(1, 3)
        ], 
        [
         'category'=>'Напитки и соки',
         'product'=>'Арбузный сок',
         'quantity'=>'',
         'weight' => '',
         'cost' => 7500,
         'volume' => rand(1, 3)
     ],
     [
          'category'=>'Напитки и соки',
          'product'=>'RС кола',
          'quantity'=>'',
          'weight' => '',
          'cost' => 6500,
          'volume' => rand(1, 3)
     ],
     [
           'category'=>'Напитки и соки',
           'product'=>'Лимонад',
           'quantity'=>'',
           'cost' => 5000,
           'weight' => '',
           'volume' => rand(1, 3)
     ],
     [
         'category'=>'Мясные продукты',
         'product'=>'Говяжья мясо',
         'quantity'=>'',
         'cost' => 400,
         'weight' => rand(100, 10000),
         'volume' => ''
     ],
     [
         'category'=>'Мясные продукты',
         'product'=>'Куриное мясо',
         'quantity'=>'',
         'cost' => 180,
         'weight' => rand(100, 10000),
         'volume' => ''
     ],
     [
         'category'=>'Мясные продукты',
         'product'=>'Рыбное мясо',
         'quantity'=>'',
         'cost' => 280,
         'weight' => rand(100, 10000),
         'volume' => ''
     ],
     [
         'category'=>'Мясные продукты',
         'product'=>'Колбаса',
         'quantity'=>'',
         'cost' => 42,
         'weight' => rand(100, 10000),
         'volume' => ''
     ],
     [
         'category'=>'Мясные продукты',
         'product'=>'Сосиски',
         'quantity'=>'',
         'cost' => 1200,
         'weight' => rand(100, 10000),
         'volume' => ''
     ]

       ];
       $start = new \Carbon\Carbon('2018-01-01 00:00');

       $faker = \Faker\Factory::create();
       $check = rand(10,100);
       $filial = rand(1,10);
       $date = $start;
       for ($i = 0; $i < 450; $i++) {
            if(! (($i+1)%3) ){
              $check = rand(10,100);  
              $date = $start->addDays(2)->addHours(2);
              $filial = rand(1,10);
            }
          $date->format('Y-m-d H:i:s');
          $offst = rand(1, 100)% sizeof($product);
            Purchase::create([
                'user_ID' => 7452833,
                'product_category' => $product[$offst]['category'],
                'product_name' => $product[$offst]['product'],
                'company' => 'Macro',
                'cost'=> $product[$offst]['cost'],
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
