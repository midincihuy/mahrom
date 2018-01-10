<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // create roles and assign existing permissions
      $role = Role::create(['name' => 'administrator']);
      $role->givePermissionTo('users_manage');
      $role->givePermissionTo('blog_manage');
    }
}
