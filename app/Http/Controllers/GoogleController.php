<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{

	//When register using Socialite, the role_id will be 0 because the user don't have select a role yet
	const ROLE_ID_USER = 0;
	const ACCOUNT_TYPE_MISSING_MESSAGE = 'Please select your account type to continue.';

	/**
	 * Create a new controller instance.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirectToGoogle()
	: \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
	{

		return Socialite::driver('google')->redirect();
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function handleGoogleCallback()
	{

		try {

			$user = Socialite::driver('google')->user();

			$finduser = User::where('google_id', $user->id)->first();

			if ($finduser) {

				Auth::login($finduser);

				if ($finduser->role_id == self::ROLE_ID_USER) {
					return redirect()->intended('user/profile')->with('message', self::ACCOUNT_TYPE_MISSING_MESSAGE);
				}

				return redirect()->intended('dashboard');

			} else {

				$findUserGoogle = User::where('github_id', '!=', '')
									  ->where('email', $user->email)->first();


				if (!empty($findUserGoogle)) {
					return redirect()->intended('login')
									 ->with('message', 'Looks like your email is already user by an account with Github');
				}

				$newUser = User::create([
											'name' => $user->name,
											'email' => $user->email,
											'google_id' => $user->id,
											'password' => Hash::make(uniqid()),
											'role_id' => self::ROLE_ID_USER,
										]);

				Auth::login($newUser);

				return redirect()->intended('dashboard')->with('message', self::ACCOUNT_TYPE_MISSING_MESSAGE);
			}

		} catch (Exception $e) {
			$message = 'Looks like we have an issue accessing your account linked with Google';
			if ($e->getCode() == 401) {
				$message = 'Looks like your Google session login expired, try again latter';
			}

			return redirect()->intended('login')
							 ->with('message', $message);
		}
	}
}