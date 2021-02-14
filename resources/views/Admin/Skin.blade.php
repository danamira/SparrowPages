@extends('layouts.admin')
@section('title')تنظیمات قالب@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">تنظیمات قالب</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <form action="/admin/skin" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="settings" id="skin_settings">
            <div class="control">
                <span>عنوان کاور صفحه اصلی</span>
                <input type="text" value="{{adminConfig('home_heading')}}" name="home_heading">
                <p>این عنوان در کاور موجود در صفحه اصلی استفاده میشود . در آن سرویس را معرفی کنید .</p>
            </div>
            <div class="control">
                <span>توضیحات کاور صفحه اصلی</span>
                <input type="text" value="{{adminConfig('home_intro')}}" name="home_intro">
                <p>این توضیحات با فونت کوچکتر زیر عنوان کاور قرار میگیرد . راجع به خدمات سرویس در آن توضیح دهید .</p>
            </div>
            <div class="control">
                <span>استایل های جانبی</span>
                <textarea name="extra_css">{{adminConfig('extra_css')}}</textarea>
                <p>اگر قصد افزودن استایل های جانبی / کد CSS به صفحات وبسایت دارید آن را اینجا وارد کنید . این کد های در
                    تمامی صفحات اعمال خواهد شد .</p>

            </div>
            <div class="control">
                <span>اسکریپت  های جانبی</span>
                <textarea name="extra_js">{{adminConfig('extra_js')}}</textarea>
                <p>اگر قصد افزودن کتابخانه های جانبی / کد جاواسکریپت به صفحات وبسایت دارید آن را اینجا وارد کنید . این
                    کد های در تمامی صفحات اعمال خواهد شد .</p>
            </div>
            <div class="control">
                <span>لوگو سایت</span>
                <div class="upload_control" id="site_logo"></div>
            </div>
            <div class="control">
                <span>پیش نمایش سایت</span>
                <div class="upload_control" id="header_phone"></div>
                <p>این پیشنمایش داخل فریم موبایل در صفحه اصلی نمایش داده خواهد شد .</p>
            </div>
            <div class="control">
                <span>پس زمینه کاور صفحه اصلی</span>
                <div class="upload_control" id="header_bg"></div>
                <p>این الگو به عنوان پس زمینه کاور موجود در صفحه اصلی استفاده میشود .</p>
            </div>
        </div>
        <div class="form-options">
            <div class="buttons">
                <button class="btn">ذخیره تنظیمات</button>
            </div>
        </div>
    </form>
@stop
