@extends('layouts.admin')
@section('title')تنظیمات سایت@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">تنظیمات وبسایت</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <form action="/admin/settings" method="POST">
        @csrf
        <div class="settings">
            <div class="control">
                <span>نام وبسایت</span>
                <input type="text" value="{{adminConfig('site_title')}}" name="site_title">
                <p>این نام هویت تجاری وبسایت شما را مشخص میکند و در بخش های مختلف استفاده میشود .</p>
            </div>
            <div class="control">
                <span>عنوان صفحات سایت</span>
                <input type="text" value="{{adminConfig('page_title')}}" name="page_title">
                <p>این عنوان در بالای تب های مرورگر کاربران نشان داده خواهد شد .</p>
            </div>
            <div class="control">
                <span>آدرس وبسایت</span>
                <input type="text" value="{{adminConfig('site_url')}}" name="site_url" id="site_url">
                <p>برای دادن لینک پروفایل به کاربر از این آدرس استفاده خواهد شد . اگر چند دامنه دارید یکی از آنها را
                    انتخاب و در اینجا وارد کنید.</p>
            </div>
        </div>
        <div class="form-options">
            <div class="buttons">
                <button class="btn">ذخیره تنظیمات</button>
            </div>
        </div>
    </form>
@stop
