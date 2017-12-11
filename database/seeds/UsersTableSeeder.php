<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedTestUsers();
    }

    private function seedTestUsers()
    {
        User::create([
            'name'	 => 'Admin',
            'email'	 => 'admin@admin.com',
            'role' => 1,
            'invited_by' => 1,
            'mobile' => 11111111,
            'is_active' => 1,
            'password' => bcrypt('123123')
        ]);
    }
}
