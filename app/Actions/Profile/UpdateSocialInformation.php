<?php

namespace App\Actions\Profile;

use App\Models\User;
use App\ObjectValue\Link;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateSocialInformation
{

    /**
     * Validate and update the given user's social links.
     *
     * @param array<string, string|null> $input
     *
     * @throws AuthenticationException|ValidationException
     */
    public function update(?User $user, array $input): void
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

        $user->links = Link::fromArray([
            'website' => $input['website'] ?? '',
            'linkedin' => $input['linkedin'] ?? '',
            'github' =>  $input['github'] ?? '',
            'twitter' => $input['twitter'] ?? '',
        ]);

        $user->save();
    }
}
