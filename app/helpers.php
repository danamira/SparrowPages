<?php
function readyToGo($text)
{
    $text = strtr($text, array('0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'));
    $text = str_replace('phone number', 'شماره تلفن', $text);
    $text = str_replace('site logo', 'ورودی لوگو سایت', $text);
    return $text;
}

function farsiNum($text)
{
    $text = strtr($text, array('0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'));
    return $text;
}

function adminConfig($config)
{
    if ($config == 'url') {
        return \App\Models\Setting::where('key', 'site_url')->first()->value;
    }
    $x = \App\Models\Setting::where('key', $config)->first();
    if (!$x) {
        return '';
    }
    return $x->value;
}

function newMessages()
{
    return \Illuminate\Support\Facades\DB::table('messages')->where('seen', false)->count();
}

function addHttp($text)
{
    if (str_split($text, 4)[0] !== 'http') {
        return 'http://' . $text;
    }
    return $text;
}
function getAvatarUrl($email) {
    $default = "https://i.postimg.cc/BvPRZWqs/Sparrow.png";
    $size = 250;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    return $grav_url;
}