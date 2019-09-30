<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          [
            'name' => 'wordpress'
          ],
          [
            'name' => 'laravel'
          ],
          [
            'name' => 'android'
          ]
        ];

        foreach($categories as $categories)
      {
        Category::create($categories);
      }
    }
}
