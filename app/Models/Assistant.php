<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'address',
        'status',
        'role_id',
        'timestamp',
        'clinic_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
