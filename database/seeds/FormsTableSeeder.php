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

        foreach(range(1, 100) as $index) {
            Form::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'address' => $faker->address,
                'mobile' => $faker->phonenumber,
                'gender' => ($index %2 == 0) ? 'male' : 'female',
                'is_paid' => ($index %2 == 0) ? true : false,
                'payment_ref' => ($index %2 == 0) ? $faker->text : null
            ]);
        }
    }
}
