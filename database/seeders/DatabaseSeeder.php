<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create([
            'name' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

        $features = ['users', 'roles'];
        $permissions = ['create', 'view', 'edit', 'delete'];

        foreach ($features as  $feature) {
            $last_feature = Feature::create([
                'name' => $feature
            ]);

            foreach ($permissions as $permission) {
                $p = Permission::create([
                    'name' => $permission,
                    'feature_id' => $last_feature->id
                ]);
                $role->permissions()->attach($p->id);
            }
        }
    }
}
