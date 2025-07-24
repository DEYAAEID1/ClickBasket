<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable implements LaratrustUser
{
     use HasRolesAndPermissions; 
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
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

public function getRoleAttribute()
{
     return $this->roles->first()->name ?? null; 

}
}