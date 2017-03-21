<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$role = [

			[
				'name' => 'admin',
				'display_name' => 'Administrator',
				'description' => 'Administrator',
			],

			[
				'name' => 'user',
				'display_name' => 'User',
				'description' => 'User',
			],

			[
				'name' => 'owner',
				'display_name' => 'Owner',
				'description' => 'Owner',
			],

		];

		foreach ($role as $key => $value) {

			Role::create($value);

		}
	}
}
