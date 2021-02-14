<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function Profile() {
        return $this->belongsTo(Profile::class);
    }

    public function getFontIcon()
    {
        $title = $this->title;
        if(strpos($title,'تلگرام')!==false) {
            return 'mdi-telegram';
        }
        if(strpos($title,'واتس اپ')!==false) {
            return 'mdi-whatsapp';
        }
        if(strpos($title,'یوتیوب')!==false) {
            return 'mdi-youtube';
        }
        if(strpos($title,'توییتر')!==false) {
            return 'mdi-twitter';
        }
        if(strpos($title,'وبسایت')!==false) {
            return 'mdi-web';
        }
        if(strpos($title,'خرید')!==false) {
            return 'mdi-shopping';
        }
        if(strpos($title,'گیت هاب')!==false) {
            return 'mdi-github';
        }
        if(strpos($title,'اینستاگرام')!==false) {
            return 'mdi-instagram';
        }
        if(strpos($title,'فروشگاه')!==false) {
            return 'mdi-store';
        }
        if(strpos($title,'توییچ')!==false) {
            return 'mdi-twitch';
        }
        return 'mdi-link-variant';
    }
    use HasFactory;
}
