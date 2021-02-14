<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Profile;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function newLinkForm()
    {
        return view('Link.New');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:profiles',
            'title' => 'required',
            'heading' => 'required|max:200'
        ]);
        $link = new Profile([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);
        $link->username = $request->username;
        $link->user_id = Auth::user()->id;
        $link->save();
        Session::flash('pop', ['class' => 'success', 'msg' => 'لینک جدید با موفقیت ایجاد شد .']);
        return redirect('/profile/' . $link->id . '/edit');
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('Link.Edit', ['profile' => $profile]);
    }

    public function update(Profile $profile, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'button_view' => 'required',
            'social_view' => 'required',
            'theme' => 'required',
        ]);
        if ($request->button_view !== 'btn_normal' && $request->button_view !== 'btn_round') {
            return redirect()->back()->withErrors([
                'فید نحوه نمایش دکمه ها قابل قبول نیست .'
            ]);
        }
        if ($request->social_view !== 'social_icons' && $request->social_view !== 'social_row') {
            return redirect()->back()->withErrors([
                'فید نحوه نمایش شبکه های اجتماعی قابل قبول نیست .'
            ]);
        }
        if ($request->theme !== 'dark' && $request->theme !== 'light') {
            return redirect()->back()->withErrors([
                'تم انتخاب شده موجود نیست !'
            ]);
        }
        $profile->button_view = $request->button_view;
        $profile->theme = $request->theme;
        $profile->social_view = $request->social_view;
        $profile->title = $request->title;
        $profile->heading = $request->heading;
        $profile->telegram = $request->telegram;
        $profile->whatsapp = $request->whatsapp;
        $profile->instagram = $request->instagram;
        $profile->twitter = $request->twitter;
        $profile->address = $request->address;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();
        Link::where('profile_id', $profile->id)->delete();
        $links = explode('**$$** ', $request->links);
        if (!$links[0] == "") {
            foreach ($links as $link) {
                $link = explode(' %%**%% ', $link);

                if (!isset($link[0]) or !isset($link[1])) {
                    return redirect()->back()->withErrors(['عنوان یا آدرس لینک نمیتواند خالی باشد .']);
                }
                $n = new Link();
                $n->title = $link[0];
                $n->href = addHttp($link[1]);
                $n->profile_id = $profile->id;
                $n->save();
            }
        }
        Session::flash('pop', ['class' => 'success', 'msg' => 'با موفقیت ویرایش شد .']);
        if (Auth::user()->isAdmin()) {
            if ($profile->user_id !== Auth::user()->id) {
                return redirect('/admin/user/' . $profile->user->id);
            }
        }
        return redirect('/');
    }

    public function remove(Profile $profile)
    {
        $this->authorize('delete', $profile);
        return view('Link.Remove', ['profile' => $profile]);
    }

    public function destroy(Profile $profile)
    {
        $this->authorize('delete', $profile);
        $profile->delete();
        Session::flash('pop', ['class' => 'success', 'msg' => 'با موفقیت حذف شد .']);
        return redirect('/');
    }

    public function show(Request $request, $username)
    {
        $profile = Profile::where('username', $username)->firstOrFail();
        if ($profile->user->banned) {
            return view('Link.Banned', ['profile' => $profile]);
        }
        if (!View::where('ip', $request->ip())->whereDate('created_at', Carbon::today())->where('profile_id', $profile->id)->first()) {
            View::create([
                'ip' => $request->ip(),
                'profile_id' => $profile->id
            ]);
        }
        return view('Link.Show', ['profile' => $profile]);
    }

    public function all()
    {
        $profiles = Profile::all()->reverse();
        return view('Link.All',['profiles'=>$profiles]);
    }
}
