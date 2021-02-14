<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function roleInFarsi()
    {
        if ($this->role == 'admin') {
            return 'مدیر سایت';
        }
        if ($this->role == 'superAdmin') {
            return 'مدیر اصلی';
        }
        return 'کاربر عادی';
    }

    public function isAdmin()
    {
        return $this->role == 'admin' or $this->role == 'superAdmin';
    }

    public function signupDate()
    {
        return farsiNum($this->created_at->day . ' ' . $this->created_at->monthName . ' ' . $this->created_at->year);
    }

    public function getRoleIcon()
    {
        if ($this->role == 'superAdmin') {
            return 'mdi-chess-king';
        }
        if ($this->role == 'admin') {
            return 'mdi-chess-knight';
        }
        return 'mdi-chess-pawn';
    }
}
