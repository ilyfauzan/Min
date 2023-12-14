<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAndRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Habibur Bahroni',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        Role::create(['name' => 'Pembeli']);
        Role::create(['name' => 'Penjual']);
        $role = Role::create(['name' => 'Admin']);
        $user->assignRole([$role->id]);
    }
}
