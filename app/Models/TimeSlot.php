<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['doc_id', 'date', 'time', 'status'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doc_id', 'id');
    }

    public function times()
    {
        return $this->hasMany(TimeSlot::class, 'id');
    }
}
