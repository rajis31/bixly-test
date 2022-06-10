<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $fillable = [
        "make",
        "model",
        "year",
        "length",
        "width",
        "hin",
        "current_hours",
        "service_interval",
        "next_service"
    ];
}
