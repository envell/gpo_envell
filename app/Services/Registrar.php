<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

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
      'name' => 'required|max:255',
      'lastname' => 'required|max:255',
      'middlename' => 'required|max:255',
      'phone_number' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|confirmed|min:6',
      'post' => 'required'
    ]);
}	
	
	public function create(array $data)
{
  return User::create([
    'name' => $data['name'],
    'lastname' => $data['lastname'],
    'middlename' => $data['middlename'],
    'email' => $data['email'],
    'post' => $data['post'],
    'phone_number' => $data['phone_number'],
    'password' => bcrypt($data['password'])
  ]);
}

}
