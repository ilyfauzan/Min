<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view produk']);
        Permission::create(['name' => 'create produk']);
        Permission::create(['name' => 'edit produk']);
        Permission::create(['name' => 'delete produk']);
        Permission::create(['name' => 'publish produk']);
        Permission::create(['name' => 'unpublish produk']);


        Permission::create(['name' => 'view store']);
        Permission::create(['name' => 'view banner']);
        Permission::create(['name' => 'create store']);
        Permission::create(['name' => 'create banner']);
        Permission::create(['name' => 'edit store']);
        Permission::create(['name' => 'edit banner']);
        Permission::create(['name' => 'delete store']);
        Permission::create(['name' => 'delete banner']);

        //create roles and assign existing permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view produk');
        $userRole->givePermissionTo('create produk');
        $userRole->givePermissionTo('edit produk');
        $userRole->givePermissionTo('delete produk');
        $userRole->givePermissionTo('view store');
        $userRole->givePermissionTo('create store');
        $userRole->givePermissionTo('edit store');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view produk');
        $adminRole->givePermissionTo('create produk');
        $adminRole->givePermissionTo('edit produk');
        $adminRole->givePermissionTo('delete produk');
        $adminRole->givePermissionTo('view banner');
        $adminRole->givePermissionTo('create banner');
        $adminRole->givePermissionTo('edit banner');
        $adminRole->givePermissionTo('delete banner');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example user',
            'email' => 'user@ikanme.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($userRole);

        $user = User::factory()->create([
            'name' => 'Example admin user',
            'email' => 'admin@ikanme.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Example superadmin user',
            'email' => 'superadmin@ikanme.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superadminRole);
    }
}
