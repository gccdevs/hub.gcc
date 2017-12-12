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
            'name'	 => 'Customer Service',
            'email'	 => 'customerservice@glorycitychurch.com',
            'role' => 1,
            'invited_by' => 1,
            'mobile' => 11111111,
            'confirm_token' => 'used',
            'is_active' => true,
            'password' => bcrypt('123123')
        ]);

        User::create([
            'name'	 => 'Admin',
            'email'	 => 'admin@admin.com',
            'role' => 2,
            'invited_by' => 1,
            'mobile' => 11111111,
            'confirm_token' => str_random(99),
            'is_active' => false,
            'password' => bcrypt('123123')
        ]);

    }
}
