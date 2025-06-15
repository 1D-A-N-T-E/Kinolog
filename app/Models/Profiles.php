<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'street', 'house_number', 'city', 
        'postal_code', 'about', 'avatar', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}