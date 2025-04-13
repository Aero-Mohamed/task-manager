<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Default Roles
        Role::query()->insert([
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'User',
                'guard_name' => 'web',
            ]
        ]);

        // Create Permissions
        $modules = ['role', 'user', 'task'];
        $prefixes = [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
        ];
        $query = [];
        $now = now();
        foreach($modules as $module) {
            foreach($prefixes as $prefix) {
                $query[] = [
                    'name' => $prefix . '_' . $module,
                    'guard_name' => 'web',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        Permission::query()->insert($query);

        // Assign Permissions to Roles
        /** @var Role $adminRole */
        $adminRole = Role::findByName('Super Admin');
        $adminRole->syncPermissions(Permission::all());
    }
}
