<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'time',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function patient()
    // {
    //     return $this->belongsTo(Patient::class);
    // }

    // public function time()
    // {
    //     return $this->belongsTo(Time::class);
    // }

}
