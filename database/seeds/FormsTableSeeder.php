<?php

use App\Form;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_AU');

        $this->seedTestForms($faker);
    }

    private function seedTestForms($faker)
    {

        foreach(range(1, 5) as $index) {
            Form::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => $faker->address,
                'mobile' => $faker->phonenumber,
                'path' => 'friend',
                'gender' => ($index %2 == 0) ? 'male' : 'female',
                'first_time' => ($index %2 == 0) ? 'yes' : 'no',
                'is_agreed' =>  true,
                'payment_ref' => 'ch_' . str_random(24)
            ]);
        }
    }
}
