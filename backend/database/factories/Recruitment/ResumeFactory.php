<?php

namespace Database\Factories\Recruitment;

use App\Models\Recruitment\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
    protected $model = Resume::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'candidate_id' => \App\Models\Recruitment\Candidate::inRandomOrder()->first()->id,
            'uuid_vacancy' => \App\Models\Recruitment\Vacancy::inRandomOrder()->first()->uuid,
            'last_recruitment_stage_id' => \App\Models\Recruitment\RecruitmentStage::inRandomOrder()->first()->id,
            'indicated_by' => $this->faker->name,
            'professional_summary' => $this->faker->paragraph,
            'academic_background' => $this->faker->paragraph,
            'professional_experience' => $this->faker->paragraph,
            'additional_information' => $this->faker->paragraph
        ];
    }
}
