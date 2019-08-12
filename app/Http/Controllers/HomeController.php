<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')->with('posts', Post::count())
                            ->with('trashed', Post::onlyTrashed()->get()->count())
                              ->with('users', User::count())
                                ->with('categories', Category::count())
                                  ->with('site_name', Setting::first()->site_name);
    }
}
