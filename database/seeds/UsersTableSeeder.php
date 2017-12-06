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
            'is_active' => 1,
            'password' => bcrypt('123123')
        ]);

//        User::create([
//            'name'	 => 'TG',
//            'email'	 => 'gaohaoqian@gmail.com',
//            'is_active' => 1,
//            'password' => bcrypt('123123')
//        ]);

        User::create([
            'name'	 => 'Tony',
            'email'	 => 'tony@elegantmedia.com.au',
            'role' => 3,
            'invited_by' => 1,
            'is_active' => 1,
            'password' => bcrypt('123123')
        ]);
        User::create([
            'name'	 => 'TG One',
            'email'	 => 'tony@glorycitychurch.com',
            'role' => 2,
            'invited_by' => 1,
            'is_active' => 1,
            'password' => bcrypt('123123')
        ]);
    }
}
