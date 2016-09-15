<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role;
use App\User;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
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
