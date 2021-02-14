<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{adminConfig('page_title')}} - تماس با ما</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body>
@include('Header')
<div class="contact">
    <div class="container">
        <div class="contact_header">
            <h3>تماس با ما</h3>
            <p>اگر در کار با اسپارو به مشکل برخوردید یا نیاز داشتید با ما ارتباط برقرار کنید میتوانید از این فرم استفاده
                کنید . ما پیام های شما را در سریعترین زمان ممکن بررسی میکنیم .</p>
        </div>
        <form action="/contact" method="POST">
            @csrf
            <div style="overflow:hidden;">
                <div class="contact_right">
                    <input type="text" placeholder="نام شما" name="name">
                    <input type="text" placeholder="شماره تماس" name="phoneNumber">
                    <input type="text" placeholder="موضوع پیام" name="subject">
                </div>
                <div class="contact_left">
                    <textarea placeholder="پیام خود را بنویسید ..." name="body"></textarea>
                </div>
            </div>
            <div class="contact_buttons">
                <button type="submit" class="btn">ارسال پیام</button>
            </div>
        </form>
    </div>

</div>
@include('Includes.pop')
<script src="/js/j.js"></script>
<script src="/js/sparrow.js"></script>
</body>
</html>
