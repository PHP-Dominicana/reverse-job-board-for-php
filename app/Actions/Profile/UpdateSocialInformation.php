<?php

namespace App\Actions\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;

class UpdateSocialInformation
{

    /**
     * Validate and update the given user's social links.
     *
     * @param array<string, string|null> $input
     *
     * @throws AuthenticationException
     */
    public function update(User $user, array $input): void
    {

        if ($user === null) {
            throw new AuthenticationException();
        }

        Validator::make($input, [
            'website' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'github' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
        ])->validateWithBag('updateSocialInformation');


        $user->links = json_encode([
            'website' => $input['website'],
            'linkedin' => $input['linkedin'],
            'github' =>  $input['github'],
            'twitter' => $input['twitter'],
        ]);

        $user->save();
    }
}
