<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'APPARTEMENT'
          ]);
  
          Category::create([
            'name' => 'AUTO'
          ]);
  
          Category::create([
            'name' => 'BATEAUX'
          ]);
    }
}
