<?php

namespace Database\Factories\Recruitment;

use App\Models\Recruitment\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobsVacancy>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
            'cpf' => $this->faker->randomNumber(9),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'cep' => $this->faker->randomNumber(9)
        ];
    }
}
