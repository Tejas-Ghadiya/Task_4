<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pdf extends Model
{
    protected $table = 'pdf';
    use HasFactory, Notifiable;
    protected $fillable = [
        'bid',
        'path',
    ];
}
