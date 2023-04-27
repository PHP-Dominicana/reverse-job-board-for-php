<?php

namespace App\Actions\Developer;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Validator;

class UpdatesUserDeveloperInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param array<string, string|null> $input
     *
     * @throws AuthenticationException
     */
    public function update(?User $user, array $input): void
    {
        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:20'],
            'status' => ['required'],
            'experience_level' => ['required'],
            'location' => ['required'],
        ])->validateWithBag('updateDeveloperInformation');

        if ($user === null) {
            throw new AuthenticationException();
        }

        $user->forceFill([
            'title' => $input['title'],
            'description' => $input['description'],
            'status' => $input['status'],
            'experience_level' => $input['experience_level'],
            'location' => $input['location'],
            'phone_number' => $input['phone_number'],
        ])->save();
    }
}
