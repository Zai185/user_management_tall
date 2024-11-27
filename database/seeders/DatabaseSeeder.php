<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $role = Role::create([
            'name' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

        $features = ['users', 'roles', 'products', 'brands', 'categories', 'units'];

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

        Category::create([
            'name' => "Phone"
        ]);

        for ($i = 0; $i < 4; $i++) {
            Brand::create([
                'name' => fake()->name,
                'made_in' => fake()->country()
            ]);

            Category::create([
                "name" => fake()->name,
                'category_id' => 1
            ]);

            Unit::create([
                'name' => fake()->text(5)
            ]);
        }

        Product::factory(10)->create();

    }
}
