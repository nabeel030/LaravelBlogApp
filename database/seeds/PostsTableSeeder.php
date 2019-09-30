<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $posts = Post::create(
           [
             'title' => 'This is my first post',
             'img' => '/uploads/posts/1563901239ross.jpg',
             'content' => 'This is my dummy text content',
             'category_id' => 2,
             'slug' => 'This is my first post',
             'user_id' => 1
           ]);

           $posts->tags()->attach(1);

           $posts = Post::create(
             [
               'title' => 'This is my second post',
               'img' => '/uploads/posts/1569811843friends_hd.jpg',
               'content' => 'This is my dummy text content',
               'category_id' => 1,
               'slug' => 'This is my second post',
               'user_id' => 1
             ]);

             $posts->tags()->attach(2);

             $posts = Post::create(
               [
                 'title' => 'This is my third post',
                 'img' => '/uploads/posts/1569811907freinds1.jpg',
                 'content' => 'This is my dummy text content',
                 'category_id' => 3,
                 'slug' => 'This is my third post',
                 'user_id' => 1
               ]);

               $posts->tags()->attach(3);
    }
}
