<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    // protected $fillable = ['name'];

    protected $guarded = [];

    // public function doctors()
    // {
    //     return $this->belongsToMany(Doctor::class);
    // }

    // public function patients()
    // {
    //     return $this->belongsToMany(Patient::class);
    // }

}
