<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Profile;
use App\Setting;

class UserController extends Controller
{

    public function __construct()
    {
         $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $users = User::all();
          return view('admin.users.index')->with('users',$users)
                                            ->with('site_name', Setting::first()->site_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' =>$user->id,
            'avatar' => 'uploads/users/user.png',
        ]);

        Session::flash('success','User Added Successfully');
        return redirect()->route('users');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);

      foreach($user->post as $posts)
      {
        $posts->forceDelete();
      }

      $user->profile->delete();
      $user->delete();
      Session::flash('success','User Deleted Successfully');
      return redirect()->back();
    }

    public function make_admin($id)
    {
          $user = User::find($id);
          $user->admin = 1;
          $user->save();
          return redirect()->back();
    }

    public function remove_admin($id)
    {
          $user = User::find($id);
          $user->admin = 0;
          $user->save();
          return redirect()->back();
    }
}
