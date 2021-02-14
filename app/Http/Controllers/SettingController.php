<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function edit()
    {
        return view('Admin.Settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required',
            'site_url' => 'required',
            'page_title' => 'required',
        ]);
        Setting::where('key', 'site_title')->update(['value' => $request->site_title]);
        Setting::where('key', 'site_url')->update(['value' => addHttp($request->site_url)]);
        Setting::where('key', 'page_title')->update(['value' => $request->page_title]);
        if ($request->extra_js) {
            Setting::where('key', 'extra_js')->update(['value' => $request->extra_js]);

        }
        if ($request->extra_css) {
            Setting::where('key', 'extra_css')->update(['value' => $request->extra_css]);

        }
        Session::flash('pop', ['class' => 'success', 'msg' => 'تنظیمات با موفقیت اعمال شد !']);
        return redirect('/admin');
    }
}
