<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'address',
        'main_image',
        'status',
        'content',
        'time_open',
        'time_closed',
        'hotline',
        'user_id',
        'location_id',
        'place_type_id',
    ];
}
