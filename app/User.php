<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function books()
    {
        // 本を新しい順で取得
        return $this->hasMany('App\Book')->latest();
    }

    // Override
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailJapanese);
    }

    // $userが管理者かどうか
    public function isAdmin($id = null)
    {
        $id = ($id) ? $id : $this->id;
        return $id == config('admin_id');
    }
}
