<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
      return view('welcome')->with('setting',Setting::first())
                            ->with('categories', Category::take(5)->get())
                            ->with('lattest_post', Post::orderBy('created_at','desc')->first())
                            ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('wordpress', Category::find(2))
                            ->with('laravel', Category::find(1))
                            ->with('android', Category::find(3));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $nextId = Post::where('id', '>', $post->id)->min('id');
        $preId = Post::where('id', '<', $post->id)->max('id');

        return view('singlepost')->with('setting', Setting::first())
                                ->with('categories', Category::take(5)->get())
                                ->with('title', $post->title)
                                ->with('post', $post)
                                ->with('user', User::all())
                                ->with('nextPost', Post::find($nextId))
                                ->with('prePost', Post::find($preId))
                                ->with('blogTags', Tag::all());

    }

    public function categoryPage($id, $name)
    {
        return view('categories')->with('setting', Setting::first())
                                 ->with('categories', Category::take(5)->get())
                                 ->with('categoryId', Category::find($id));
    }

    public function tagsPage($id, $tag)
    {
        return view('tags')->with('setting', Setting::first())
                                 ->with('categories', Category::take(5)->get())
                                 ->with('tagId', Tag::find($id));
    }


}
