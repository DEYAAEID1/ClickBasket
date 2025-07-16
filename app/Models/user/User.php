<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRolesAndPermissions;
    protected $fillable = [
    'name',
    'email',
    'password',
    'phone',
    'address',
    'city',
    'postal_code',
    'country',
    'avatar',
];

    // استخدام casts
    /*لما يكون عندك عمود تاريخ (timestamp/datetime) أو Boolean أو JSON
     وتريد تتعامل معه في Laravel
      ككائن أو قيمة منطقية (true/false)
       مباشرة بدل ما يظل نص (string).*/
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];


}
