<?php

namespace App\Services\Recruitment;

use App\Interfaces\Recruitment\RecruitmentStageInterface;
use App\Models\Recruitment\RecruitmentStage;

use function App\Helpers\userCanAction;

class RecruitmentStageService extends Recruitment implements RecruitmentStageInterface
{

    public function list($params)
    {
        #userCanAction("can-curriculus-recruitment-stages-list");

        $filterActicve = $this->yesNoAll($params["active"]);

        return RecruitmentStage::whereIn("active", $filterActicve)
            ->get();

    }

    public function listCandidateByStage($params)
    {
        userCanAction("can-curriculus-recruitment-stages-listCandidateByStage");

        return RecruitmentStage::where("id", "=", $params["recruitment-stage-id"])
            ->with([
                'resumes' => function ($query) {
                    $query->limit(100)->with('candidate', 'vacancy');
                }
            ])
            ->first();
    }
}
