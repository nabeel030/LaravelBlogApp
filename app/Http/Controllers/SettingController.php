<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting')->with('setting', Setting::first())
                                    ->with('site_name', Setting::first()->site_name);
    }

    public function update(Request $req)
    {
          $setting = Setting::first();

          $setting->site_name = $req->site_name;
          $setting->contact_number = $req->contact_number;
          $setting->contact_email = $req->contact_email;
          $setting->address = $req->address;
          $setting->save();

          return redirect()->back();

    }
}
