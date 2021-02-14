<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\User;
use App\Models\View;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function dashboard()
    {
        
        $last30 = [
            'signups' => [],
            'views' => []
        ];
        $last30['signups']=User::whereBetween('created_at',[Carbon::today()->addDay(-30),Carbon::today()])->count();
        $last30['views']=View::whereBetween('created_at',[Carbon::today()->addDay(-30),Carbon::today()])->count();
        $users = User::all()->count();
        $profiles = Profile::all()->count();
        $views = View::all()->count();
        $today=View::where('created_at',Carbon::today())->count();
        $yesterday=View::where('created_at',Carbon::yesterday())->count();
        $links = Link::all()->count();
        return view('Admin.Dashboard', ['views' => $views, 'users' => $users, 'profiles' => $profiles,'links'=>$links,'today'=>$today,'yesterday'=>$yesterday,'month'=>$last30]);
    }

    public function stats()
    {
        if (Carbon::now()->dayOfWeek == 6) {
            $lastWeek = [
                View::whereDate('created_at', Carbon::now()->addDay(0))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(1))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(2))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(3))->get()->count(),
                View::whereDate('created_at', Carbon::now()
                    ->addDay(4))->get()->count(),
                View::whereDate('created_at', Carbon::now()
                    ->addDay(5))->get()->count(),
                View::whereDate('created_at', Carbon::now()
                    ->addDay(6))->get()->count(),
            ];

        } elseif (Carbon::now()->dayOfWeek == 7) {
            $lastWeek = [
                View::whereDate('created_at', Carbon::now()->addDay(-1))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(0))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(1))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(2))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(3))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(4))->get()->count(),
                View::whereDate('created_at', Carbon::now()->addDay(5))->get()->count(),
            ];
        } else {
            $lastWeek = [
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(-2))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(-1))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(0))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))->get()->count(),
                View::whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))->get()->count(),
            ];

        }
        $last30 = [
            'signups' => [],
            'views' => []
        ];
        $last30dates = [];
        $i = 0;
        while ($i >= -29) {
            array_push($last30['views'], View::whereDate('created_at', Carbon::now()->addDay($i))->get()->count());
            $x = Carbon::now()->addDay($i);
            array_push($last30dates, farsiNum($x->day) . ' ' . $x->monthName);
            $i = $i - 1;
        }
        $i = 0;
        while ($i >= -29) {
            array_push($last30['signups'], User::whereDate('created_at', Carbon::now()->addDay($i))->get()->count());
            $i = $i - 1;
        }
        $last30['signups'] = array_reverse($last30['signups']);
        $last30['views'] = array_reverse($last30['views']);
        $last30dates = array_reverse($last30dates);
        $bestProfiles = Profile::withCount('views')->get()->sortBy('views_count')->reverse()->take(6);
        $sum = [
            'views' => [
                'today' => View::whereDate('created_at', Carbon::today())->count(),
                'yesterday' => View::whereDate('created_at', Carbon::today()->addDay(-1))->count(),
                'week' => array_sum($lastWeek),
                'last30' => array_sum($last30['views']),
                'all' => View::count(),
            ],
            'signups' => [
                'today' => User::whereDate('created_at', Carbon::today())->count(),
                'yesterday' => User::whereDate('created_at', Carbon::today()->addDay(-1))->count(),
                'last30' => array_sum($last30['signups']),
                'all' => User::count(),
                'profiles' => Profile::count(),
            ]
        ];
        return view('Admin.Stats', ['sum' => $sum, 'lastWeek' => $lastWeek, 'bestProfiles' => $bestProfiles, 'last30' => $last30, 'last30labels' => $last30dates]);

    }

    public function skin()
    {
        return view('Admin.Skin');
    }


    public function updateSkin(Request $request)
    {
        $request->validate([
            'site_logo' => 'nullable|image',
            'header_phone' => 'nullable|image',
            'header_bg' => 'nullable|image',
        ]);
        if ($request->get('home_heading')) {
            Setting::where('key', 'home_heading')->update(['value' => $request->home_heading]);
        }
        if ($request->get('home_intro')) {
            Setting::where('key', 'home_intro')->update(['value' => $request->home_intro]);
        }
        if ($request->get('extra_css')) {
            Setting::where('key', 'extra_css')->update(['value' => $request->extra_css]);
        }
        if ($request->get('extra_js')) {
            Setting::where('key', 'extra_js')->update(['value' => $request->extra_js]);
        }
        if ($request->file('site_logo')) {
            $request->file('site_logo')->storeAs('public/assets', 'logo');
        }
        if ($request->file('header_bg')) {
            $request->file('header_bg')->storeAs('public/assets', 'header_bg');
        }
        if ($request->file('header_phone')) {
            $request->file('header_phone')->storeAs('public/assets', 'preview');
        }
        Session::flash('pop', ['class' => 'success', 'msg' => 'تنظیمات قالب بروزرسانی شد .']);
        return redirect('/admin');
    }

    public function Messages()
    {
        $messages = Message::all()->reverse();
        return view('Admin.Messages', ['messages' => $messages]);
    }

    public function SMS()
    {
        return view('Admin.SMS');
    }
    public function about()
    {
        return view('Admin.About');
    }
}
