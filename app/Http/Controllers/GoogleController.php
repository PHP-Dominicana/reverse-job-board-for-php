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

				return redirect()->intended('dashboard');

			} else {
				$newUser = User::create([
											'name' => $user->name,
											'email' => $user->email,
											'google_id' => $user->id,
											'password' => Hash::make(uniqid()),
											'role_id' => 2,
										]);

				Auth::login($newUser);

				return redirect()->intended('dashboard');
			}

		} catch (Exception $e) {
			dd($e->getMessage());
		}
	}
}