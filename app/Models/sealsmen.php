<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class sealsmen extends Model
{
    protected $table = 'sealsmen';
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'ditels',
        'shop_name',
        'mobile_number',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
