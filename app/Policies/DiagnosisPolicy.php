<?php

namespace App\Policies;

use App\Models\Diagnosis;
use App\Models\User;

class DiagnosisPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Diagnosis $diagnosis): bool
    {
        return $user->id === $diagnosis->user_id || $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Diagnosis $diagnosis): bool
    {
        return false;
    }

    public function delete(User $user, Diagnosis $diagnosis): bool
    {
        return $user->id === $diagnosis->user_id || $user->role === 'admin';
    }
}
