<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

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
    public function definition(): array
    {
        return [
            //
            'school_id' => School::inRandomOrder()->value('id'),
            'full_name' => $this->faker->name(),
            'student_id' => $this->faker->unique()->bothify('STD-#####'),
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
