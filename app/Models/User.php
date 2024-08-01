<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\TimeSlot;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'gender',
        'role_id',
        'phone_number',
        'image',
        'address',
        'education',
        'description',
        'specialty',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function userAvatar($request)
    {
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);
        return $name;
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    public function isDoctor()
    {
        // Assuming Role model has a 'name' attribute
        return $this->role()->where('name', 'doctor');
    }
    public function isAdmin()
    {
        // Assuming Role model has a 'name' attribute
        return $this->role()->where('name', 'admin');
    }
    public function isPatient()
    {
        // Assuming Role model has a 'name' attribute
        return $this->role()->where('name', 'patient');
    }

    public function timeslots()
    {
        return $this->hasMany(TimeSlot::class, 'doc_id');
    }

    public function bookings()
    {
        // return $this->hasMany(Booking::class, 'user_id', 'id');
        return $this->hasMany(Booking::class);
    }
}