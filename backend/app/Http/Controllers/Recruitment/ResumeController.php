<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Recruitment\ResumeSearchRequest;
use App\Http\Requests\Recruitment\ResumeSearchByUuidRequest;
use App\Interfaces\Recruitment\ResumeInterface;

class ResumeController extends Controller
{
    public function search(ResumeSearchRequest $request, ResumeInterface $resumeService)
    {
        $params = $request->safe()->only(["item",]);
        return $resumeService->search($params);

    }

    public function searchByUuid(ResumeSearchByUuidRequest $request, ResumeInterface $resumeService)
    {
        $params = $request->safe()->only(["uuid",]);
        return $resumeService->searchByUuid($params);

    }
}
