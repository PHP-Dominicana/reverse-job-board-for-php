<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GithubController extends Controller
{

	const ROLE_ID_USER = 2;

	/**
	 * Create a new controller instance.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirectToGithub()
	: \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
	{

		return Socialite::driver('github')->redirect();
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function handleGithubCallback()
	{

		try {

			$user = Socialite::driver('github')->user();

			$finduser = User::where('github_id', $user->id)->first();

			if ($finduser) {

				Auth::login($finduser);

				dd($finduser);

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