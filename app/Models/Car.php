<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'year',
        'license_plate',
        'rental_price_per_day',
        'availability_status',
        'image',
        'description',
    ];
}
