<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


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
            'role' => 'Super Admin',
            'invited_by' => 1,
            'mobile' => 11111111,
            'confirm_token' => 'used',
            'is_active' => true,
            'password' => bcrypt('123123')
        ]);

        User::create([
            'name'	 => 'Example',
            'email'	 => 'example@example.com',
            'role' => 'User',
            'invited_by' => 1,
            'mobile' => 11111111,
            'confirm_token' => str_random(99),
            'is_active' => false,
            'password' => bcrypt('123123')
        ]);
    }
}
