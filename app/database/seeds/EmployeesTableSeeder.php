<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder {

	public function run()
	{
		$this->createFakerEmployee();
	}

	protected function createFakerEmployee()
    {
        $faker = Faker::create();
        for($i = 1; $i < 50; $i++) {
            $employee = new Employee();
            $employee->first_name = $faker->firstName;
            $employee->last_name = $faker->lastName;
            $employee->email = $faker->email;
            $employee->hire_date = $faker->date($format = 'Y-m-d');
            $employee->password = $faker->password;
            $employee->save();
        }
    }

}