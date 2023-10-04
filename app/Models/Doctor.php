<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'speciality',
        'phone',
        'address',
        'email',
        'role_id',
        'status',
        'password',
        'image',
        'facebook_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
