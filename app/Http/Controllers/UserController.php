<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\View;

class UserController extends Controller
{
    public function all()
    {
        $users = User::all();
        return view('Admin.User.All', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('Admin.User.Single', ['user' => $user]);
    }

    public function me()
    {
        return view('Account.Edit');
    }

    public function delete(Request $request)
    {
        $request->validate(['user_id' => 'required']);
        $user = User::findOrFail($request->user_id);
        DB::table('profiles')->where('user_id', $user->id)->delete();
        $this->authorize('delete', $user);
        $user->delete();
        session()->flash('pop', ['class' => 'success', 'msg' => 'با موفقیت حذف شد .']);
        return redirect('/admin/users');
    }

    public function upgrade(\Illuminate\Http\Request $request)
    {
        $request->validate(['user_id' => 'required']);
        $user = User::findOrFail($request->user_id);
        $this->authorize('promote', $user);
        $user->role = 'admin';
        $user->update();
        Session::flash('pop', ['class' => 'success', 'msg' => 'کاربر با موفقیت ارتقا داده شد .']);
        return redirect('/admin/users');
    }

    public function ban(Request $request)
    {
        $request->validate(['user_id' => 'required']);
        $user = User::findOrFail($request->user_id);
        $this->authorize('ban', $user);
        $user->banned = true;
        $user->role = 'normal_user';
        $user->update();
        Session::flash('pop', ['class' => 'success', 'msg' => 'کاربر با موفقیت مسدود شد .']);
        return redirect('/admin/users');
    }

    public function depose(\Illuminate\Http\Request $request)
    {
        $request->validate(['user_id' => 'required']);
        $user = User::findOrFail($request->user_id);
        $this->authorize('depose', $user);
        $user->role = 'normal_user';
        $user->update();
        Session::flash('pop', ['class' => 'success', 'msg' => 'کاربر با موفقیت از مدیریت برکنار شد .']);
        return redirect('/admin/users');
    }
    public function edit(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        Auth::user()->email = $request->email;
        Auth::user()->name=$request->name;
        Auth::user()->update();
        Session::flash('pop',['class'=>'success','msg'=>'با موفقیت ویرایش شد .']);
        return redirect('/');


    }
    public function bannedMessage()
    {
        return view('Banned');
    }

}
