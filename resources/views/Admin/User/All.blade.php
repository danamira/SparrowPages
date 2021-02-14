@extends('layouts.admin')
@section('title')دیوار ها@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">لیست کاربران</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <div class="users">
        @foreach($users as $user)
            <div class="user">
                <div class="name"><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></div>
                <div class="role">
                    <span>{{$user->roleInFarsi()}}</span>
                </div>
                <div class="join_date">
                    عضویت :
                    {{farsiNum(\Illuminate\Support\Carbon::make($user->created_at)->ago())}}
                </div>
                <div class="profiles">
                    <span>{{farsiNum($user->profiles->count())}} پروفایل </span>
                </div>
            </div>
        @endforeach
    </div>
@stop
