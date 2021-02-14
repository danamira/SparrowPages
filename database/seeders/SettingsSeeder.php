<?php

namespace Database\Seeders;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'site_title', 'value' => 'اسپارو']);
        Setting::create(['key' => 'page_title', 'value' => 'اسپارو']);
        Setting::create(['key' => 'site_url', 'value' => 'http:/127.0.0.1:8000']);
        Setting::create(['key' => 'home_heading', 'value' => 'با زیلینک بیشتر از یک لینک در اینستاگرام داشته باشید.']);
        Setting::create(['key' => 'home_intro', 'value' => 'به کمک زیلینک همه راههای ارتباطی رو یک جا جمع کنید و پروفایل شخصی خودتون رو بسازید.']);
        Setting::create(['key' => 'extra_js', 'value' => '']);
        Setting::create(['key' => 'extra_css', 'value' => '']);
    }
}
