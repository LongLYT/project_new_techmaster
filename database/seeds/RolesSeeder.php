<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Model\Role::create([
			'name' => 'Administrator',
			'permissions' => serialize([
				'product.create' => true,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Customer',
			'permissions' => serialize([
				'product.create' => false,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Accountant',
			'permissions' => serialize([
				'product.create' => false,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Stock Keeper',
			'permissions' => serialize([
				'product.create' => true,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Shipper',
			'permissions' => serialize([
				'product.create' => false,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Marketer',
			'permissions' => serialize([
				'product.create' => false,
			])
		]);

		\App\Model\Role::create([
			'name' => 'Sales',
			'permissions' => serialize([
				'product.create' => false,
			])
		]);

		\App\Model\UserRole::create([
			'user_id' => 1,
			'role_id' => 1
		]);
    }
}
