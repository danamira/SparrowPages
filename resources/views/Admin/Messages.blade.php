@extends('layouts.admin')
@section('title')پیام ها@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">پیام های دریافتی</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <div class="messages">
        @foreach($messages as $message)
            <div class="message">
                <div class="msg_head">
                    <span class="right">
                                                <i class="mdi mdi-account"></i>
                        توسط
                        {{$message->name}}</span>
                    <span class="right_option">
                                                <i class="mdi mdi-calendar"></i>
                        {{farsiNum($message->created_at->ago())}}
                    </span>
                    <span class="left_option">
                                                <i class="mdi mdi-phone"></i>
                        <a href="tel:{{$message->phoneNumber}}">{{farsiNum($message->phoneNumber)}}
                        </a>
                    </span>
                </div>
                <p class="msg_body">{{farsiNum($message->body)}}</p>
            </div>
        @endforeach
    </div>
@stop
@section('js')
    <script>
    </script>

@stop

