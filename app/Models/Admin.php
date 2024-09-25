<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// class Admin extends Model
class Admin extends Authenticatable // must added Authenticatable and remove Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'admin';  // Important for Spatie permission

    protected $fillable = [
        'name',
        'type',
        'phone',
        'email',
        'password',
        'image',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
