<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>حذف پروفایل</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="single_body">
<div class="single_panel" id="new_link_form">
    <div class="panel_header">حذف پروفایل : {{$profile->title}}</div>
    <div class="panel_content" id="remove_profile">
        <form method="POST" action="/profile/{{$profile->id}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <p>آیا مطمئن هستید قصد دارید این پروفایل را حذف کنید ؟ بعد از حذف پروفایل دسترسی به آن و یا بازیابی آن امکان پذیر نخواهد بود .</p>
            <button type="submit" id="submit">حذف این پروفایل</button>
        </form>
        </p>
    </div>
</div>
<script src="/js/j.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
