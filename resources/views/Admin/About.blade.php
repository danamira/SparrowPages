@extends('layouts.admin')
@section('title')درباره اسپارو@endsection
@section('header')
    <h3 class="title">درباره اسپارو</h3>
    <div class="menu_left">
    </div>
@stop
@section('content')
    <div class="nextVersion">
        <img src="/assets/pics/brand.png" alt="">
        <h4>ممنون بابت خرید اسپارو ورژن {{farsiNum('1.0')}}</h4>
        <p class="about">این اولین ورژن اسکریپت پروفایل شخصی اسپارو بود . اسپارو در ایران طراحی و تولید شده و بر خلاف
            سایر اسکریپت های
            مشابه ترجمه شده نیست .</p>
        <span id="powers_title">میخواین بدونین اسپارو از چیا قدرت میگیره ؟</span>
        <div class="powers">
            <div class="row">
                <div class="power">
                    <i class="mdi mdi-language-php"></i>
                    <span>زبان پی اچ پی</span>
                </div>
                <div class="power">
                    <i class="mdi mdi-laravel"></i>
                    <span>فریم ورک لاراول</span>
                </div>
                <div class="power">
                    <i class="mdi mdi-vuejs"></i>
                    <span>فریم ورک ویو جی اس</span>
                </div>
                <div class="power">
                    <i class="mdi mdi-jquery"></i>
                    <span>کتابخانه جی کوئری</span>
                </div>
            </div>
        </div>
        <div class="support">
            <h3>پشتیبانی فنی اسکریپت</h3>
            <div class="row">
                <i class="mdi mdi-email"></i>
                <a href="#" class="tar">danadev94@gmai.com</a>
                <p>اگر در کار با اسکریپت به مشکل خوردید میتونید به من ایمیل بزنید :</p>
            </div>
            <div class="row">
                <i class="mdi mdi-telegram"></i>
                <a href="" class="tar">@danamirafzal</a>
                <p>اگر درخواست نصب اسکریپت یا سفارش ویرایش / اسکریپت اختصاصی داشتید این تلگرام منه :</p>
            </div>
            <div class="row">
                <i class="mdi mdi-web"></i>
                <a href="" class="tar">DevNinja.ir</a>
                <p>این هم وبسایت ماست اگر خواستید سر بزنید :</p>
            </div>
        </div>
        <div class="credits">
            <i class="mdi mdi-code-array"></i>
            <p>طراحی ، برنامه نویسی و انتشار توسط دانا میرافضل | پاییز
                {{farsiNum(1399)}}
                | تمامی حقوق برای سازنده محفوظ است .
            </p>
        </div>
    </div>
@stop
