@extends('layouts.admin')
@section('title')دیوار ها@endsection
@section('header')
    <div class="menu_right">
        <a href="#" class="mdi mdi-history"></a>
        <a href="#" class="mdi mdi-account"></a>
    </div>
    <h3 class="title">مدیریت کاربر : {{$user->name}}</h3>
    <div class="menu_left">
        <a href="#" class="mdi mdi-magnify"></a>
    </div>
@stop
@section('content')
    <div class="user_heading">
        <div class="icon">
            <i class="mdi mdi-account-circle"></i>
        </div>
        <div class="user_info">
            <h4>{{$user->name}}</h4>
            <span class="role">{{$user->roleInFarsi()}}</span>
        </div>
    </div>
    <div class="user_table">
        <div class="col">
            <i class="mdi mdi-calendar"></i>
            <span class="cole_title">تاریخ عضویت</span>
            <span class="col_value">{{$user->signupDate()}}</span>
        </div>
        <div class="col">
            <i class="mdi mdi-face-recognition"></i>
            <span class="cole_title">تعداد پروفایل ها</span>
            <span class="col_value">{{farsiNum($user->profiles->count())}}</span>
        </div>
        <div class="col">
            <i class="mdi {{$user->getRoleIcon()}}"></i>
            <span class="cole_title">نقش کاربر</span>
            <span class="col_value">{{$user->roleInFarsi()}}</span>
        </div>
        <div class="col">
            <i class="mdi mdi-phone"></i>
            <span class="cole_title">شماره موبایل</span>
            <span class="col_value"><a href="tel:{{$user->phoneNumber}}">{{farsiNum($user->phoneNumber)}}</a></span>
        </div>
        <div class="col">
            <i class="mdi mdi-eye"></i>
            <span class="cole_title">تعداد بازدید ها</span>
            <span class="col_value">{{farsiNum(130)}}</span>
        </div>
    </div>
    @if($user->profiles->count())
        <div class="user_profiles">
            <h3>پروفایل های {{$user->name}}</h3>
            <div class="list">
                @foreach($user->profiles as $profile)
                    <a href="{!! $profile->getUrl()!!}" target="_blank">{{$profile->title}}</a>
                @endforeach
            </div>
            <p>با کلیک روی هر کدام از پروفایل ها به صفحه مشاهده و ویرایش/حذف آنها میروید .</p>
        </div>
    @endif
    @if($user->banned)
        <div class="user_ban">
            <i class="mdi mdi-information"></i>
            <p>این کاربر توسط مدیریت سایت مسدود شده . دسترسی کاربر برای همیشه به وبسایت مسدود خواهد بود .</p>
        </div>
    @endif
    <div class="user_actions">
        @can('promote',$user)
            <a href="#" id="user_promote" class="option">ارتقا به مدیر</a>
        @endcan
        @can('depose',$user)
            <a href="#" id="user_depose" class="option">برکناری از مدیریت</a>
        @endcan
        @can('ban',$user)
            <a href="#" id="user_ban" class="option">مسدود کردن حساب</a>
        @endcan
        @can('delete',$user)
            <a href="#" id="user_delete" class="option">حذف حساب</a>
        @endcan
    </div>
@stop
@section('includes')
    <div class="modals">
        @can('promote',$user)
            <div class="modal" id="user_promote_modal">
                <div class="modal_head">
                    <h3>ارتقا کاربر</h3>
                    <i class="mdi mdi-close"></i>
                </div>
                <div class="modal_body">
                    <p>آیا مطمئنید که قصد دارید کاربر {{$user->name}} را به مدیریت ارتقا دهید ؟
                        پس از ارتقا کاربر قادر به ایجاد تغییرات در سایت ، حذف یا ویرایش کاربران ، پروفایل ها ، دسترسی به
                        آمار سایت و سایر امکانات مدیریتی خواهد بود .</p>
                </div>
                <div class="modal_actions">
                    <form action="/admin/upgradeUser" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn">ارتقا به مدیریت</button>
                    </form>
                </div>
            </div>
        @endcan
        @can('depose',$user)
            <div class="modal" id="user_depose_modal">
                <div class="modal_head">
                    <h3>برکناری مدیر</h3>
                    <i class="mdi mdi-close"></i>
                </div>
                <div class="modal_body">
                    <p>
                        آیا مطمئن هستید میخواید کاربر ( {{$user->name}} )
                        را از مدیریت برکنار کنید ؟ با انجام این کار تمام دسترسی های کاربر به پنل مدیریت قطع خواهد شد .
                    </p>
                </div>
                <div class="modal_actions">
                    <form action="/admin/deposeUser" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn">برکناری از مدیریت</button>
                    </form>
                </div>
            </div>
        @endcan
        @can('delete',$user)
            <div class="modal" id="user_delete_modal">
                <div class="modal_head">
                    <h3>حذف کاربر</h3>
                    <i class="mdi mdi-close"></i>
                </div>
                <div class="modal_body">
                    <p>آیا مطمئن هستید که تمایل دارید کاربر {{$user->name}} را حذف کنید ؟
                        توجه داشته باشید این حذف دائمی خواهد بود و قابل برگشت نیست . با حذف این کاربر پروفایل ها و تمامی
                        اطلاعات او از دیتابیس حذف خواهد شد.
                    </p>
                </div>
                <div class="modal_actions">
                    <form action="/admin/user/delete" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn">بله مطمئنم ، حذف کاربر</button>
                    </form>
                </div>
            </div>
        @endcan
        @can('ban',$user)
            <div class="modal" id="user_ban_modal">
                <div class="modal_head">
                    <h3>مسدود کردن کاربر</h3>
                    <i class="mdi mdi-close"></i>
                </div>
                <div class="modal_body">
                    <p>
                        آیا مطمئن هستید که قصد دارید کاربر ( {{$user->name}} (
                        را مسدود کنید ؟ با انجام اینکار اطلاعات کاربر در دیتابیس باقی خواهد ماند ولی کاربر اجازه استفاده
                        از سرویس های سایت را نخواهد داشت !
                        <br>
                        توجه داشته باشید این تغییر قابل برگشت نیست !
                    </p>
                </div>
                <div class="modal_actions">
                    <form action="/admin/user/ban" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn">بله مطمئنم ، مسدود کردن کاربر</button>
                    </form>
                </div>
            </div>
        @endcan
    </div>
@stop
