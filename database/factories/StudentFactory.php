<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_number' => 'STU/23/'.$this->faker->unique()->numberBetween(1000, 9999),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->userName.'@example.com',
            'phone' => '0801234'.$this->faker->numberBetween(1111, 9999),
            'password' => bcrypt('123456'),
            'level_id' => $this->faker->numberBetween(1, 4),
            'department_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
