<header class="header">
    <div class="right">
        <img src="/storage/assets/logo" alt="اسپارو | ارسال هدیه از خارج ایران" class="logo">
        <ul class="menu">
            @if(auth()->check())
                <li><a href="/">داشبورد شما</a></li>
            @else
                <li><a href="/">صفحه اصلی</a></li>
            @endif
            <li><a href="/digikalaGift">راهنمای اسپارو</a></li>
            <li><a href="/contact">تماس با ما</a></li>
            <li><a href="#">درباره ما</a></li>
        </ul>
    </div>
    <div class="left">
        @if(auth()->check())
            <div class="auth_box">
                <a href="/logout" class="mdi mdi-power" id="logout" title="خروج از حساب"></a>
                <a href="/account" class="mdi mdi-account" title="حساب کاربری"></a>
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    <a href="/admin" class="mdi mdi-speedometer" title="پنل مدیریت"></a>
                @endif
            </div>
        @else
            <a href="/login" id="order_status">ورود به حساب</a>
        @endif
    </div>
</header>
