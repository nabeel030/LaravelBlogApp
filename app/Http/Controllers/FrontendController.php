<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
      return view('welcome')->with('setting',Setting::first())
                            ->with('categories', Category::take(5)->get())
                            ->with('lattest_post', Post::orderBy('created_at','desc')->first())
                            ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('wordpress', Category::find(3))
                            ->with('laravel', Category::find(4))
                            ->with('android', Category::find(7));
    }
}
