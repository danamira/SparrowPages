@extends('layouts.admin')
@section('title')لیست پروفایل ها@endsection
@section('header')
    <div class="menu_right">
        <a href="{{adminConfig('site_url')}}" target="_blank" title="مشاهده سایت" class="mdi mdi-eye"></a>
    </div>
    <h3 class="title">پروفایل های کاربران</h3>
    <div class="menu_left">
    </div>
@stop
@section('content')
    <div class="prs">
        @foreach($profiles as $profile)
            <a target="_blank" href="{{$profile->getUrl()}}">
            <div class="pr">
                <h2>{{$profile->title}}</h2>
                <h3>{{$profile->heading}}</h3>
                <div class="socials">
                    @if($profile->telegram)
                        <i class="mdi mdi-telegram"></i>
                    @endif
                    @if($profile->whatsapp)
                        <i class="mdi mdi-whatsapp"></i>
                    @endif
                    @if($profile->instagram)
                        <i class="mdi mdi-instagram"></i>
                    @endif
                    @if($profile->twitter)
                        <i class="mdi mdi-twitter"></i>
                    @endif
                </div>
                <p class="links">
                    <i class="mdi mdi-link-variant"></i>
                    {{farsiNum($profile->links->count())}}
                    لینک شخصی ثبت شده
                </p>
            </div>
            </a>
        @endforeach
    </div>
@stop
