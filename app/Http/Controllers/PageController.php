<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function Home()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('Pages.Home');
    }

    public function dashboard()
    {
        return view('Dashboard.home');
    }

    public function contactForm()
    {
        return view('Pages.Contact');
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phoneNumber' => 'required|iran_mobile',
            'subject' => 'required',
            'body' => 'required'
        ]);
        $msg = new Message($request->all());
        $msg->save();
        Session::flash('pop', ['class' => 'success', 'msg' => 'با موفقیت ارسال شد .']);
        return redirect('/contact');
    }
}
