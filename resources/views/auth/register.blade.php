<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ایجاد حساب کاربری</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="single_body">
<div class="single_panel">
    <div class="panel_header">ایجاد حساب کاربری</div>
    <div class="panel_content">
        @if($errors->any())
            <div class="alert">
                <i class="mdi mdi-alert-box"></i>
                <p>{{readyToGo($errors->first())}}</p>
            </div>
        @endif
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="control">
                <i class="mdi mdi-account"></i>
                <input type="text" placeholder="نام کامل" name="name" value="{{old('name')}}">
            </div>
            <div class="control">
                <i class="mdi mdi-phone"></i>
                <input type="text" placeholder="شماره موبایل" name="phoneNumber" value="{{old('phoneNumber')}}">
            </div>
            <div class="control">
                <i class="mdi mdi-lock"></i>
                <input type="password" placeholder="رمز عبور" name="password">
            </div>
            <div class="control">
                <i class="mdi mdi-lock"></i>
                <input type="password" placeholder="تایید رمز عبور" name="password_confirmation">
            </div>
            <button type="submit" id="submit">ورود</button>
        </form>
        <p class="help">قبلا ثبت نام کرده اید ؟
            <a href="#">ورود به حساب .</a>
        </p>
    </div>
</div>
</body>
</html>