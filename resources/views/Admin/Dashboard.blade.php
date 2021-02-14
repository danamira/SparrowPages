@extends('layouts.admin')
@section('title')دیوار ها@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">داشبورد</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <div class="stats">
        <div class="row">
            <div class="stat">
                <i class="mdi mdi-account-multiple"></i>
                <span>کاربران</span>
                <span>{{farsiNum($users)}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-view-grid"></i>
                <span>پروفایل ها</span>
                <span>{{farsiNum($profiles)}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-link-variant"></i>
                <span>لینک های خارجی</span>
                <span>{{farsiNum($links)}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-eye"></i>
                <span>بازدید پروفایل ها (کل)</span>
                <span>{{farsiNum($views)}}</span>
            </div>
        </div>
        <div class="row">
            <div class="stat">
                <i class="mdi mdi-eye"></i>
                <span>بازدید امروز</span>
                <span>{{farsiNum($today)}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-eye"></i>
                <span>بازدید دیروز</span>
                <span>{{farsiNum($yesterday)}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-eye"></i>
                <span>بازدید ماه</span>
                <span>{{farsiNum($month['views'])}}</span>
            </div>
            <div class="stat">
                <i class="mdi mdi-account-plus"></i>
                <span>ثبت نام ماه</span>
                <span>{{farsiNum($month['signups'])}}</span>
            </div>
        </div>
    </div>
@stop
