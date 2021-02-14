<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به حساب کاربری</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="single_body">
<div class="single_panel">
    <div class="panel_header">ورود به حساب</div>
    <div class="panel_content">
        @if($errors->any())
            <div class="alert">
                <i class="mdi mdi-alert-box"></i>
                <p>{{readyToGo($errors->first())}}</p>
            </div>
        @endif
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="control">
                <i class="mdi mdi-account"></i>
                <input type="text" placeholder="شماره موبایل" name="phoneNumber" value="{{old('phoneNumber')}}">
            </div>
            <div class="control">
                <i class="mdi mdi-lock"></i>
                <input type="password" placeholder="پسورد" name="password">
            </div>
            <button type="submit" id="submit">ورود</button>
        </form>
        <p class="help">رمز عبور خود را فراموش کردید ؟
            <a href="#">کلیک کنید .</a>
        </p>
    </div>
</div>
</body>
</html>
