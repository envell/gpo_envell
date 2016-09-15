<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role;
use App\User;


class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    User::create(array(
      'email' => 'envell123@gmail.com',
      'password' => Hash::make("123"),
      'name' => 'Envell',

       ));
		
		
		Model::unguard();
$statRole = Role::create([
    'name' => 'statistic',
    'slug' => 'statistic',
]);

$docRole = Role::create([
    'name' => 'doctor',
    'slug' => 'doctor',
]);
$user = User::find(1);
$user->attachRole($statRole);
$user = User::find(2);
$user->attachRole($docRole);

		// $this->call('UserTableSeeder');
	}

}
