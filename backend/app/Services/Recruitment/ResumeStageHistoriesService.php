<?php

namespace App\Services\Recruitment;

use App\Interfaces\Recruitment\ResumeStageHistoriesInterface;
use App\Models\Recruitment\Resume;
use App\Models\Recruitment\ResumeStageHistory;

use function App\Helpers\userCanAction;

class ResumeStageHistoriesService extends Recruitment implements ResumeStageHistoriesInterface
{

    public function save($params)
    {
        userCanAction("can-curriculus-resume-stage-histories-save");

        $user = auth()->user();

        Resume::where("id", "=", (int) $params["resumeId"])
            ->update([
                'last_recruitment_stage_id' => (int) $params["recruitmentStageId"]
            ]);

        return ResumeStageHistory::create([
            "candidate_id" => (int) $params["candidateId"],
            "uuid_vacancy" => $params["vacancyUuid"],
            "recruitment_stage_id" => (int) $params["recruitmentStageId"],
            "resume_id" => (int) $params["resumeId"],
            "observation" => $params["observation"],
            "login_user" => $user->username,
            "name_user" => $user->name,
            "start_in" => $params["startTime"],
            "end_in" => $params["endTime"]
        ]);
    }

}
