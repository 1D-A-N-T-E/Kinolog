<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'street',
    'house_number',
    'city',
    'postal_code',
    'phone',
    'about',
    'avatar'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}