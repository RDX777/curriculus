<?php

namespace Database\Factories\Recruitment;

use App\Models\Recruitment\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobsVacancy>
 */
class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'company_id' => \App\Models\Recruitment\Company::inRandomOrder()->first()->id,
            'work_mode_id' => \App\Models\Recruitment\WorkMode::inRandomOrder()->first()->id,
            'title' => $this->faker->jobTitle,
            'short_description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph
        ];
    }
}
