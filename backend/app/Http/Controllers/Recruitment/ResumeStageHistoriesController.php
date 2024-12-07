<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;

use App\Http\Requests\Recruitment\ResumeStageHistoriesSaveRequest;
use App\Interfaces\Recruitment\ResumeStageHistoriesInterface;

class ResumeStageHistoriesController extends Controller
{
    public function save(ResumeStageHistoriesSaveRequest $request, ResumeStageHistoriesInterface $resumeStageHistoriesService) {
        $validated = $request->validated();
        return $resumeStageHistoriesService->save($validated);
    }
}
