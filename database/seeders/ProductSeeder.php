<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();
        foreach(range(1,10) as $item){
          Product::create([
              'name'         => $facker->name,
              'user_id'      => 1,
              'category_id'  => rand(1,10),
              'brand_id'     => rand(1,10),
              'image'        => $facker->imageUrl,
              'sku'          => $facker->name,
              'cost_price'   => 10.10,
              'retail_price' => 10.10,
              'year'         => '2022',
              'description'  => $facker->paragraph,

          ]);
        } 
    }
}
