<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل {{$profile->title}}</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/materialdesignicons.min.css">
</head>
<body id="render_body" class="{{$profile->theme}}">
<div class="preview {{$profile->social_view}} {{$profile->button_view}}" id="profile_render">
    <div class="info">
        <h1 class="title">{{ $profile->title }}</h1>
        <h2>{{$profile->heading}}</h2>
    </div>
    <div class="social">
        @if($profile->telegram)
            <a href="tg://resolve?domain={{$profile->telegram}}" id="telegram"><i class="mdi mdi-telegram"></i>
                تلگرام
            </a>
        @endif
        @if($profile->whatsapp)
            <a href="https://wa.me/98{{$profile->whatsapp}}" id="whatsapp"><i class="mdi mdi-whatsapp"></i>
                واتس اپ
            </a>
        @endif
        @if($profile->instagram)
            <a href="http://instagram.com/{{$profile->instagram}}" id="instagram"><i class="mdi mdi-instagram"></i>
                اینستاگرام
            </a>
        @endif
        @if($profile->twitter)
            <a href="http://twitter.com/{{$profile->twitter}}" id="twitter"><i class="mdi mdi-twitter"></i>
                توییتر
            </a>
        @endif
    </div>
    <div class="contact">
        <div class="btn">
            @if($profile->phone)
                <a href="tel:{{$profile->phone}}">
                    <div class="call">
                        <i class="mdi mdi-phone"></i>
                        تلفن
                    </div>
                </a>
            @endif
            @if($profile->email)
                <div class="call">
                    <a href="mailto:{{$profile->email}}">
                        <i class="mdi mdi-email"></i>
                        ایمیل
                    </a>
                </div>
            @endif
        </div>
        <div class="external_links">
            @foreach($profile->links as $link)
                <a href="{{$link->href}}">
                    <i class="mdi {{$link->getFontIcon()}}"></i>
                    {{$link->title}}</a>
            @endforeach
        </div>
        @if($profile->address)
            <p class="loc">{{farsiNum($profile->address)}}</p>
        @endif
    </div>
</div>
@can('update',$profile)
    <a href="/profile/{{$profile->id}}/edit" id="profile_up" class="mdi mdi-pencil-box" name="ویرایش پروفایل"></a>
@endcan
<script src="/js/vue.js"></script>
<script src="/js/edit.js"></script>
</body>
</html>
