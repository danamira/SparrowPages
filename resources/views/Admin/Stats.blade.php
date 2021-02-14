@extends('layouts.admin')
@section('title')تنظیمات سایت@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">آمار بازدید ها</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <div class="stats">
        <div class="stats_help">
            <p>
                <i class="mdi mdi-information-outline"></i>
                آمار ارائه شده در این صفحه مربوط به بازدید از پروفایل های کاربران است و آمار بازدید از صفحات دیگر سایت
                شما ارائه نشده . برای دسترسی به آمار بازدید از صفحات دیگر و آنالیز بیشتر میتوانید از ابزار هایی مثل
                <a href="#">Google Analytics</a>
                استفاده کنید .</p>
        </div>
        <div class="stats_row">
            <div class="bprofiles">
                <h4>پربازدید ترین پروفایل ها</h4>
                @foreach($bestProfiles as $profile)
                    <div class="b">
                        <a href="{{$profile->getUrl()}}" class="btitle">{{$profile->title}}</a>
                        <span class="bcount">{{farsiNum($profile->views->count())}} بازدید</span>
                    </div>
                @endforeach
            </div>
            <div class="last_week">
                <h4>بازدید های این هفته</h4>
                <canvas id="myChart" dir="rtl"></canvas>
            </div>
        </div>
        <div class="stats_row">
            <div class="last30">
                <h4>{{farsiNum('بازدید 30 روز اخیر')}}</h4>
                <canvas id="lt" dir="rtl"></canvas>
            </div>
            <div class="stsum">
                <h4>خلاصه آمار بازدید</h4>
                <ul>
                    <li>
                        <i class="mdi mdi-calendar-today"></i>
                        بازدید امروز :
                        <span>{{farsiNum($sum['views']['today'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-calendar-outline"></i>
                        بازدید دیروز :
                        <span>{{farsiNum($sum['views']['yesterday'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-calendar-week"></i>
                        بازدید هفته :
                        <span>{{farsiNum($sum['views']['week'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-calendar-month"></i>
                        بازدید {{farsiNum(30)}} روز اخیر :
                        <span>{{farsiNum($sum['views']['last30'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-calendar-multiple"></i>
                        بازدید کل :
                        <span>{{farsiNum($sum['views']['all'])}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="stats_row signups">
            <div class="last30">
                <h4>{{farsiNum('ثبت نام 30 روز اخیر')}}</h4>
                <canvas id="lts" dir="rtl"></canvas>
            </div>
            <div class="stsum">
                <h4>خلاصه آمار ثبت نام</h4>
                <ul>
                    <li>
                        <i class="mdi mdi-account"></i>
                        ثبت نام امروز :
                        <span>{{farsiNum($sum['signups']['today'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-account-clock"></i>
                        ثبت نام دیروز :
                        <span>{{farsiNum($sum['signups']['yesterday'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-account-multiple"></i>
                        ثبت نام {{farsiNum(30)}} روز اخیر :
                        <span>{{farsiNum($sum['signups']['last30'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-account-group"></i>
                        ثبت نام کل :
                        <span>{{farsiNum($sum['signups']['all'])}}</span>
                    </li>
                    <li>
                        <i class="mdi mdi-account-box"></i>
                        کل پروفایل ها :
                        <span>{{farsiNum($sum['signups']['profiles'])}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('includes')
    <script src="/js/chart.js"></script>
    <script>
        function fillArray(value, len) {
            var arr = [];
            for (var i = 0; i < len; i++) {
                arr.push(value);
            }
            return arr;
        }

        var ctx = document.getElementById('myChart').getContext('2d');
        Chart.defaults.global.defaultFontFamily = 'IRANYekanWeb';
        var lastWeek = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنجشنبه', 'جمعه'],
                datasets: [{
                    label: 'بازدید ها',
                    backgroundColor: '#1285ff',
                    borderColor: '#1285ff',
                    data: [{{$lastWeek[0]}}, {{$lastWeek[1]}},{{$lastWeek[2]}},{{$lastWeek[3]}},{{$lastWeek[4]}},{{$lastWeek[5]}},{{$lastWeek[6]}},],
                }]
            },

            // Configuration options go here
            options: {
                tooltip: {
                    rtl: true,
                },
                legend: {
                    display: false,
                },
            }
        });
        var lt = document.getElementById('lt').getContext('2d');
        var lts = document.getElementById('lts').getContext('2d');
        var last30 = new Chart(lt, {
            type: 'line',
            data: {
                labels: [
                    @foreach($last30labels as $record)
                        "{{$record}}",
                    @endforeach
                ],
                datasets: [{
                    label: 'بازدید ها',
                    backgroundColor: 'rgba(255,255,255,0)',
                    borderColor: '#ac2b2b',

                    data: [
                        @foreach($last30['views'] as $record)
                        {{$record}},
                        @endforeach
                    ],

                }]
            },
            options: {
                legend: {
                    display: false,
                },
            }
        });
        var last30 = new Chart(lts, {
            type: 'line',
            data: {
                labels: [
                    @foreach($last30labels as $record)
                        "{{$record}}",
                    @endforeach
                ],
                datasets: [{
                    label: 'ثبت نام ها',
                    backgroundColor: 'rgba(255,255,255,0)',
                    borderColor: '#166d2c',

                    data: [
                        @foreach($last30['signups'] as $record)
                        {{$record}},
                        @endforeach
                    ],

                }]
            },
            options: {
                legend: {
                    display: false,
                },
            }
        });
    </script>
@stop
