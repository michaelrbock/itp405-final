<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\Models\Advertiser;
use App\Models\Blogger;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'type' => 'required',
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:5',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user = new User();

		if ($data['type'] == '?type=advertiser') {
			$additonal = Advertiser::create([
				'name' => $data['additional_name'],
				'website' => $data['website']
			]);
			$user->advertiser_id = $additonal->id;
			$user->type = 'advertiser';
		} else if ($data['type'] == '?type=blogger') {
			$additonal = Blogger::create([
				'name' => $data['additional_name'],
				'website' => $data['website']
			]);
			$user->blogger_id = $additonal->id;
			$user->type = 'blogger';
		}

		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);
		$user->save();

		$additonal->user_id = $user->id;
		$additonal->save();

		return $user;
	}

}
