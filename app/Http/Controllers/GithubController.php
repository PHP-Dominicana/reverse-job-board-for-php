<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{

	//When register using Socialite, the role_id will be 0 because the user don't have select a role yet
	const ROLE_ID_USER = 0;
	const ACCOUNT_TYPE_MISSING_MESSAGE = 'Please select your account type to continue.';

	/**
	 * Create a new controller instance.
	 *
	 * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirectToGithub()
	: \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
	{

		return Socialite::driver('github')->redirect();
	}

	/**
	 * Create a new controller instance.
	 *
	 */
	public function handleGithubCallback(): RedirectResponse
	{

		try {

			$user = Socialite::driver('github')->user();

			$finduser = User::where('github_id', $user->id)->first();

			if ($finduser) {

				Auth::login($finduser);

				if ($finduser->role_id == self::ROLE_ID_USER) {
					return redirect()->intended('user/profile')->with('message', self::ACCOUNT_TYPE_MISSING_MESSAGE);
				}

				return redirect()->intended('dashboard');

			} else {

				$findUserGoogle = User::where('google_id', '!=', '')
									  ->where('email', $user->email)->first();


				if (!empty($findUserGoogle)) {
					return redirect()->intended('login')
									 ->with('message', 'Looks like your email is already user by an account with Google');
				}

				$newUser = User::create([
											'name' => $user->name,
											'email' => $user->email,
											'github_id' => $user->id,
											'password' => Hash::make(uniqid()),
											'role_id' => self::ROLE_ID_USER,
										]);

				Auth::login($newUser);

				return redirect()->intended('dashboard');
			}

		} catch (Exception $e) {

			$message = 'Looks like we have an issue accessing your account linked with Github';
			if ($e->getCode() == 401) {
				$message = 'Looks like your Github session login expired, try again latter';
			}

			return redirect()->intended('login')
							 ->with('message', $message);
		}
	}
}
