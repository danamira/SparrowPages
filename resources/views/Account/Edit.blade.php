<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ویرایش مشخصات حساب</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="single_body">
<div class="single_panel" id="new_link_form">
    <div class="panel_header">ویرایش مشخصات حساب</div>
    <div class="panel_content">
        @if($errors->any())
            <div class="alert">
                <i class="mdi mdi-alert-box"></i>
                <p>{{readyToGo($errors->first())}}</p>
            </div>
        @endif
        <form method="POST" action="/account">
            @csrf
            <div class="control">
                <i class="mdi mdi-account-circle"></i>
                <input type="text" placeholder="نام کامل" name="name" value="{{auth()->user()->name}}">
            </div>
            <div class="control">
                <i class="mdi mdi-email"></i>
                <input type="email" placeholder="ایمیل شما ( برای اطلاع رسانی استفاده میشود )" name="email" value="{{Auth::user()->email}}">
            </div>
            <button type="submit" id="submit">ثبت و ادامه</button>
        </form>
        <p class="help">ایمیل در فرمت صحیح ایمیل و بدون www وارد شود .
        </p>
    </div>
</div>
<script src="/js/j.js"></script>
<script src="/js/sparrow.js"></script>
</body>
</html>
