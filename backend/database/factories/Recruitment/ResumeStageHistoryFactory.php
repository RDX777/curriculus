<?php

namespace Database\Factories\Recruitment;

use App\Models\Recruitment\ResumeStageHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResumeStageHistory>
 */
class ResumeStageHistoryFactory extends Factory
{
    protected $model = ResumeStageHistory::class;

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
            'recruitment_stage_id' => \App\Models\Recruitment\RecruitmentStage::inRandomOrder()->first()->id,
            'resume_id' => \App\Models\Recruitment\Resume::inRandomOrder()->first()->id,
            'observation' => $this->faker->paragraph,
            'login_user' => $this->faker->name,
            'name_user' => $this->faker->name,
            'start_in' => $this->faker->dateTime,
            'end_in' => $this->faker->dateTime,
        ];
    }
}
