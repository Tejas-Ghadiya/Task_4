<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Take_delivary extends Model
{
    protected $table = 'take_delivary';

    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Delivary_boy_id',
        'Delivary_boy_name',
        'Delivary_boy_number',
        'Delivary_boy_address',
        'bid',
        'pid',
        'uid',
        'user_name',
        'mobile_number',
        'pimage',
        'pname',
        'totel',
        'quantity',
        'ucity',
        'bill_condition',
        'uaddress',
        'uzip',
    ];
}
