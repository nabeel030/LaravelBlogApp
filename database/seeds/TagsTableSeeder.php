<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
        [
          'tag' => 'coding'
        ],
        [
          'tag' => 'programming'
        ],
        [
          'tag' => 'java'
        ]
      ];

      foreach($tags as $tags)
    {
      Tag::create($tags);
    }

    }
}
