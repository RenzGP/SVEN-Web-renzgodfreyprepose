<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'pet_name',
        'email',
        'phone',
        'appointment_date',
        'notes',
    ];
}
