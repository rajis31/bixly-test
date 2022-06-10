<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        "make",
        "model",
        "year",
        "seats",
        "color",
        "vin",
        "current_mileage",
        "service_interval",
        "next_service"
    ];
}
