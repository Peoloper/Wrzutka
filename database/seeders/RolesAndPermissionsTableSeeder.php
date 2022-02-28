<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'delete mem']);
        Permission::create(['name' => 'publish mem']);

        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('delete mem');
        $role1->givePermissionTo('publish mem');

        $role2 = Role::create(['name' => 'Moderator']);
        $role2->givePermissionTo('delete mem');
        $role2->givePermissionTo('publish mem');

        $role3 = Role::create(['name' => 'User']);
    }
}
