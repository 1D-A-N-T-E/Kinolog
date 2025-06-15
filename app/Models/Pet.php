<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['user_id', 'name', 'age', 'species', 'is_trained'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}