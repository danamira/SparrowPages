@extends('layouts.dashboard')
@section('title','ویرایش لینک : '.$profile->title)
@section('content')
    <div class="container" id="link_edit">
        <div class="url_bar">
            <div>
                <i class="mdi mdi-content-copy"></i>
                <span>: لینک پروفایل</span>
                <a href="{{$profile->getUrl()}}" id="profile_url">{{$profile->getUrl()}}</a>
            </div>

        </div>
        <div>
            <div class="options">
                <form method="POST" action="/profile/{{$profile->id}}">
                    <input type="hidden" name="_method" value="patch">
                    @csrf
                    <div class="section active">
                        <div class="section_head"><h3>تنظیمات اصلی</h3>
                            <i class="mdi mdi-arrow-down"></i>
                        </div>
                        <div style="display: block !important;" class="section_options">
                            <label>عنوان پروفایل :</label>
                            <input type="text" v-model="title" name="title">
                            <label>زیرعنوان :</label>
                            <input type="text" v-model="heading" name="heading">
                            <label>ظاهر دکمه ها :</label>
                            <select v-model="btnType" name="button_view">
                                <option value="btn_normal">دکمه های صاف</option>
                                <option value="btn_round">دکمه های گرد</option>
                            </select>
                            <label>ظاهر صفحه :</label>
                            <select v-model="theme" name="theme">
                                <option value="light">ظاهر روشن</option>
                                <option value="dark">ظاهر تیره</option>
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <div class="section_head"><h3>شبکه های اجتماعی</h3>
                            <i class="mdi mdi-arrow-down"></i>
                        </div>
                        <div class="section_options">
                            <label>نحوه نمایش :</label>
                            <select v-model="social_view" name="social_view">
                                <option value="social_row">نمایش سطری</option>
                                <option value="social_icons">فقط آیکون</option>
                            </select>
                            <label>آیدی تلگرام :</label>
                            <input type="text" placeholder="فقط آیدی را وارد کنید" v-model="social_tg" name="telegram">
                            <label>شماره واتساپ :</label>
                            <input type="text" placeholder="بدون پیش شماره" v-model="social_wa" name="whatsapp">
                            <label>آیدی اینستاگرام :</label>
                            <input type="text" placeholder="فقط آیدی را وارد کنید" v-model="social_ig" name="instagram">
                            <label>آیدی توییتر :</label>
                            <input type="text" placeholder="فقط آیدی را وارد کنید" v-model="social_twitter"
                                   name="twitter">
                        </div>
                    </div>
                    <div class="section">
                        <div class="section_head"><h3>مشخصات ارتباطی</h3>
                            <i class="mdi mdi-arrow-down"></i>
                        </div>
                        <div class="section_options">
                            <label>آدرس :</label>
                            <input type="text" placeholder="" v-model="contact_loc" name="address">
                            <label>تلفن تماس :</label>
                            <input type="number" placeholder="" v-model="contact_phone" name="phone">
                            <label>آدرس ایمیل :</label>
                            <input type="email" placeholder="" v-model="contact_email" name="email">
                        </div>
                    </div>
                    <div class="section">
                        <div class="section_head"><h3>لینک های شخصی</h3>
                            <i class="mdi mdi-arrow-down"></i>
                        </div>
                        <div class="section_options" id="external_links">
                            <div class="link">
                                <div v-for="(link,index) in links" class="elink">
                                    <span class="delete" v-on:click="links.splice(index,1)"> حذف لینک</span>
                                    <input type="text" placeholder="عنوان لینک" v-model="link[0]">
                                    <input type="text" placeholder="آدرس لینک" v-model="link[1]">
                                </div>
                            </div>
                            <span v-on:click="links.push(['',''])" class="new">
                        <i class="mdi mdi-plus"></i>
                        لینک جدید
                    </span>
                            <input type="hidden" v-model="linksStr" name="links">

                        </div>
                    </div>
                    <button id="update_profile">ذخیره تغییرات</button>
                </form>
            </div>
            <div class="preview" v-bind:class="preview_class">
                <div class="info">
                    <h1 class="title">@{{ title }}</h1>
                    <h2>@{{heading}}</h2>
                </div>
                <div class="social">
                    <a href="#" id="telegram" v-if="social_tg!==''"><i class="mdi mdi-telegram"></i>
                        تلگرام
                    </a>
                    <a href="#" id="whatsapp" v-if="social_wa!==''"><i class="mdi mdi-whatsapp"></i>
                        واتس اپ
                    </a>
                    <a href="#" id="instagram" v-if="social_ig!==''"><i class="mdi mdi-instagram"></i>
                        اینستاگرام
                    </a>
                    <a href="#" id="twitter" v-if="social_twitter!==''"><i class="mdi mdi-twitter"></i>
                        توییتر
                    </a>
                </div>
                <div class="contact">
                    <div class="btn">
                        <div class="call" v-if="contact_phone">
                            <i class="mdi mdi-phone"></i>
                            تلفن
                        </div>
                        <div class="call" v-if="contact_email">
                            <i class="mdi mdi-email"></i>
                            ایمیل
                        </div>
                    </div>
                    <div class="external_links">
                        <a href="#" v-for="link in links" v-if="link[0]!=='' && link[1]!==''">
                            <i class="mdi mdi-link-variant"></i>
                            @{{link[0]}}</a>
                    </div>
                    <p class="loc" v-if="contact_loc!==''">@{{contact_loc}}</p>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/vue.js"></script>
    <script src="/js/edit.js"></script>
    <script>
        let app = new Vue({
            el: '#link_edit',
            data: {
                title: '{{$profile->title}}',
                heading: '{{$profile->heading}}',
                social_view: '{{$profile->social_view}}',
                btnType: '{{$profile->button_view}}',
                social_tg: '{{$profile->telegram}}',
                social_wa: '{{$profile->whatsapp}}',
                social_ig: '{{$profile->instagram}}',
                social_twitter: '{{$profile->twitter}}',
                contact_loc: '{{$profile->address}}',
                contact_phone: '{{$profile->phone}}',
                contact_email: '{{$profile->email}}',
                theme: '{{$profile->theme}}',
                links: [
                        @foreach($profile->links as $link)
                    ["{{$link->title}}", "{{$link->href}}"],
                    @endforeach
                ]
            },
            computed: {
                preview_class: function () {
                    return this.btnType + ' ' + this.social_view + ' ' + this.theme
                },
                linksStr: function () {
                    r = []
                    this.links.forEach(function (item) {
                        r.push(item.join(' %%**%% '))
                    })
                    return r.join(' **$$** ')
                }
            }
        });
    </script>
@stop
