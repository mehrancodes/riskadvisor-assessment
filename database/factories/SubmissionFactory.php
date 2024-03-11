<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street_address' => $this->faker->streetAddress,
            'apt' => $this->faker->word(),
            'city' => $this->faker->city,
            'state' => 'TX',
            'zip_code' => $this->faker->postcode,
        ];
    }
}
