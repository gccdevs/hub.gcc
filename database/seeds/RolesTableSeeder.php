<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedTestRoles();
    }

    private function seedTestRoles()
    {
        $spa = Role::create([
            'role_slug' => 'spa',
            'role_title' => 'Super Admin',
            'parent_role_id' => null,
            'description' => 'Highest classification'
        ]);

        $admin = Role::create([
            'role_slug' => 'admin',
            'role_title' => 'Admin',
            'parent_role_id' => $spa->id,
            'description' => 'Second highest classification'
        ]);

        Role::create([
            'role_slug' => 'user',
            'role_title' => 'User',
            'parent_role_id' => $admin->id,
            'description' => 'Normal classification'
        ]);
    }
}
