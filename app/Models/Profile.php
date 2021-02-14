<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'heading', 'address'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Links()
    {
        return $this->hasMany(Link::class);
    }

    public function getUrl()
    {
        return adminConfig('url') . '/view/' . $this->username;
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }
}
