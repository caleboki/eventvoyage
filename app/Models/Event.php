<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function registrations() 
    { 
        return $this->hasMany(Registration::class); 
    }

    public function isUserRegistered($userId) 
    { 
        return $this->registrations()->where('user_id', $userId)->exists();
    }
    
    protected $casts = [ 
        'date' => 'date',
    ];

}
