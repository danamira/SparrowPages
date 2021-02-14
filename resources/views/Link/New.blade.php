<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ایجاد پروفایل جدید</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="single_body">
<div class="single_panel" id="new_link_form">
    <div class="panel_header">ایجاد پروفایل جدید</div>
    <div class="panel_content">
        @if($errors->any())
            <div class="alert">
                <i class="mdi mdi-alert-box"></i>
                <p>{{readyToGo($errors->first())}}</p>
            </div>
        @endif
        <form method="POST" action="/profile">
            @csrf
            <div class="control" id="address">
                <i class="mdi mdi-link-variant"></i>
                <span>/http://mamad.com</span>
                <input type="text" placeholder="نام کاربری" name="username" value="{{old('address')}}">
            </div>
            <div class="control">
                <i class="mdi mdi-format-title"></i>
                <input type="text" placeholder="عنوان صفحه ( برای مثال اسم شما )" name="title" value="{{old('title')}}">
            </div>
            <div class="control">
                <i class="mdi mdi-format-header-pound"></i>
                <input type="text" placeholder="زیرعنوان ( برای مثال شغل یا مهارت شما )" name="heading" value="{{old('title')}}">
            </div>
            <button type="submit" id="submit">ثبت و ادامه</button>
        </form>
        <p class="help">شناسه شما مشخص کننده آدرس نهایی لینک شماست . در آن از فاصله استفاده نکنید .
        </p>
    </div>
</div>
<script src="/js/j.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
