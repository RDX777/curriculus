<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Interfaces\Recruitment\CandidateInterface;
use App\Http\Requests\Recruitment\StoreCandidateRequest;
use App\Http\Requests\Recruitment\GetPreviousVacaniesRequest;
use App\Http\Requests\Recruitment\GetResumeStageHistoryRequest;
use App\Http\Requests\Recruitment\CandidatesSearchRequest;

class CandidateController extends Controller
{
    public function candidateList(CandidateInterface $candidateService)
    {
        return $candidateService->candidateList();
    }

    public function getPreviousVacancies(GetPreviousVacaniesRequest $request, CandidateInterface $candidateService)
    {
        $params = $request->safe()->only(["candidate-id",]);
        return $candidateService->getPreviousVacancies($params);
    }

    public function getResumeStageHistory(GetResumeStageHistoryRequest $request, CandidateInterface $candidateService)
    {
        $params = $request->safe()->only(["candidate-id", "vacancy-uuid", "resume-id"]);
        return $candidateService->getResumeStageHistory($params);
    }

    public function storeCandidate(StoreCandidateRequest $request, CandidateInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->storeCandidate($params);
        return response()->json(['message' => 'Success', "data" => $response]);
    }

    public function downloadResume(string $fileName, CandidateInterface $recruitmentService)
    {
        return $recruitmentService->downloadResume($fileName);
    }

}
