<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pet;

class PetPolicy
{
    public function delete(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }
}