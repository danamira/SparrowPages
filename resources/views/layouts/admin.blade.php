<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل مدیریت | @yield('title')</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body>
<div class="container">
    <section class="right">
        <div id="main_block">
            <a href="#" class="mdi mdi-pencil-circle settings"></a>
            <div class="profile">
                <img src="{{getAvatarUrl(Auth::user()->email)}}" alt="">
                <h3>{{farsiNum(Auth::user()->name)}}</h3>
                <a href="/logout" class="logout">خروج از حساب</a>
            </div>
            <div class="menu">
                <a href="/admin">
                    <i class="mdi mdi-speedometer"></i>
                    داشبورد
                </a>
                <a href="/admin/users">
                    <i class="mdi mdi-account-group"></i>
                    کاربران
                </a>
                <a href="/admin/profiles">
                    <i class="mdi mdi-face-recognition"></i>
                    پروفایل ها
                </a>
                <a href="/admin/messages">
                    <i class="mdi mdi-message-text"></i>
                    پیام ها
                    <span class="badge">{{farsiNum(newMessages())}}</span>
                </a>
                <a href="/admin/settings">
                    <i class="mdi mdi-tools"></i>
                    تنظیمات
                </a>
                <a href="/admin/skin">
                    <i class="mdi mdi-monitor-dashboard"></i>
                    قالب سایت
                </a>
                <a href="/admin/stats">
                    <i class="mdi mdi-chart-box"></i>
                    آمار سایت
                </a>
                <a href="/admin/sms">
                    <i class="mdi mdi-chat"></i>
                    پیامک ها
                </a>
                <a href="/admin/about">
                    <i class="mdi mdi-information"></i>
                    درباره اسکریپت
                </a>
            </div>
        </div>
    </section>
    <section class="left">
        <header class="header">
            @yield('header')
        </header>

        @yield('content')
    </section>
</div>
@include('Includes.pop')
@yield('includes')
<script src="/js/j.js"></script>
<script src="/js/sparrow.js"></script>
@yield('js')
</body>
</html>
