<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'walet',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Users role 
     * 
     * @var array
     */
    const ROLES = [
        1 => 'مدیر',
        2 => 'کاربر عادی',
        3 => 'نویسنده',
    ];

    /**
     * Users status 
     * 
     * @var array
     */
    const STATUS = [
        'active'    => 1,
        'disactive' => 0 
    ];

    public static function usersRoles()
    {
        return self::ROLES;
    }

    public static function usersStatus()
    {
        return self::STATUS;
    } 
}
