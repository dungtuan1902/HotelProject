<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use \Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{

    use HasFactory, SoftDeletes, Notifiable, HasApiTokens;
    protected $table = 'table_user';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'email_verified_at',
        'username',
        'password',
        'image',
        'role',
    ];
}