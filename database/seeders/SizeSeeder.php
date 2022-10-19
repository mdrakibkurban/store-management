<?php

namespace Database\Seeders;

use App\Models\Size;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();
          foreach(range(1,3) as $item){
            Size::create([
                'size' => $facker->name,
            ]);
          }
    }
}
