@extends('layouts.dashboard')
@section('title','داشبورد')
@section('content')
    <div class="container" id="dash_container">
        <h4 class="list_title">پروفایل های شما</h4>
        <div class="links_list">
            <a href="/profile/new">
                <div id="new">
                    <h4>
                        <i class="mdi mdi-plus-box"></i>
                        پروفایل جدید
                    </h4>
                </div>
            </a>
            @foreach(auth()->user()->profiles as $profile)
                <div class="link">
                    <h4>{{$profile->title}}</h4>
                    <p>{{$profile->heading}}</p>
                    <div class="options">
                        <a class="mdi mdi-eye" href="{{$profile->getUrl()}}" target="_blank"></a>
                        <a class="mdi mdi-pencil" href="/profile/{{$profile->id}}/edit"></a>
                        <a class="mdi mdi-trash-can" href="/profile/{{$profile->id}}/remove"></a>
                    </div>
                    <a href="{!!$profile->getUrl()!!}" class="address" target="_blank">{{$profile->getUrl()}}</a>
                </div>
            @endforeach
        </div>
    </div>
@stop
