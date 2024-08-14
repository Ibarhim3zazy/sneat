<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add_user',
            'view_user',
            'edit_user',
            'delete_user',
            'add_admin',
            'view_admin',
            'edit_admin',
            'delete_admin',
            'add_merchant',
            'view_merchant',
            'edit_merchant',
            'delete_merchant',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }
    }
}
