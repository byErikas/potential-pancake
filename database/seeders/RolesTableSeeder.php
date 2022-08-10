<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'name' => 'Admin',
            ],
            [
                'id'    => 2,
                'name' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}