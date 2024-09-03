<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CV;
use Illuminate\Auth\Access\HandlesAuthorization;

class CVPolicy
{
    use HandlesAuthorization;

    public function view(User $user, CV $cv): bool
    {
        return $user->id === $cv->user_id;
    }

    public function update(User $user, CV $cv): bool
    {
        return $user->id === $cv->user_id;
    }

    public function delete(User $user, CV $cv): bool
    {
        return $user->id === $cv->user_id;
    }
}
