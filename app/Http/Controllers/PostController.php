<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\Setting;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts)
                                          ->with('site_name', Setting::first()->site_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if ($category->count() == 0 || $tags->count()==0) {
          Session::flash('info','You need to have Category and tags to create a new post!');
          return redirect()->back();
        }
        return view('admin.posts.create')->with('category',$category)->with('tags',$tags)
                                          ->with('site_name', Setting::first()->site_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

          'title' => 'max:255',
          'img' => 'image|required',
          'content' => 'required',
          'category_id' => 'required',
          'tags' => 'required'
        ]);

        $img = $request->img;

        $img_new_name = Time().$img->getClientOriginalName();

        $img->move('uploads/posts',$img_new_name);

        $post = Post::create([
          'title' => $request->title,
          'img' => 'uploads/posts/' . $img_new_name,
          'content' => $request->content,
          'category_id' => $request->category_id,
          'slug' => str_slug($request->title),
          'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post Created Successfully');

        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $post = Post::find($id);
          $category = Category::all();

          return view('admin.posts.update')->with('posts',$post)->with('category',$category)
                                                ->with('tags',Tag::all())
                                                  ->with('site_name', Setting::first()->site_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[

        'title' => 'max:255',
        'img' => 'image',
        'content' => 'required',
        'category_id' => 'required',
        'tags' => 'required'
      ]);

      $post = Post::find($id);

      if ($request->hasFile('img')) {
          $img = $request->img;
          $img_new_name = Time(). $img->getClientOriginalName();
          $img->move('uploads/posts',$img_new_name);
          $post->img = 'uploads/posts/'.$img_new_name;
      }
      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category_id;

      $post->save();
      $post->tags()->sync($request->tags);
      Session::flash('success','Post Updated Successfully');
      return redirect()->route('post.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post Trashed Successfully');
        return redirect()->back();
    }

    public function TrashedPosts()
    {
        $trashed_posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts',$trashed_posts)
                                          ->with('site_name', Setting::first()->site_name);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Permanently Deleted');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored Successfully');
        return redirect()->route('post.index');
    }
}
