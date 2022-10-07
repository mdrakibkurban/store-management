<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
            Category::create([
                'name' => $facker->name,
                'slug'    => Str::slug($facker->name),
            ]);
          }
    }
}
