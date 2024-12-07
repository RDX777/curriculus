<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Recruitment\ListRequest;
use App\Http\Requests\Recruitment\RecruitmentStageRequest;

use App\Interfaces\Recruitment\RecruitmentStageInterface;

class RecruitmentStagesController extends Controller
{
    public function list(ListRequest $request, RecruitmentStageInterface $stageService) {
        $params = $request->safe()->only(["active",]);
        return $stageService->list($params);
    }

    public function listCandidateByStage(RecruitmentStageRequest $request, RecruitmentStageInterface $stageService) {
        $params = $request->safe()->only(["recruitment-stage-id",]);
        return $stageService->listCandidateByStage($params);
    }
}
