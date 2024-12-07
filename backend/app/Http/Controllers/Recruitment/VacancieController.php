<?php

namespace App\Http\Controllers\Recruitment;

use App\Http\Controllers\Controller;
use App\Interfaces\Recruitment\VacancyInterface;

use App\Http\Requests\Recruitment\GetVacancyRequest;
use App\Http\Requests\Recruitment\StoreVacancyRequest;
use App\Http\Requests\Recruitment\ListRequest;
use Illuminate\Http\Request;

class VacancieController extends Controller
{
    public function list(ListRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->safe()->only(["active",]);
        return $recruitmentService->list($params);
    }

    public function getVacancy(GetVacancyRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        return $recruitmentService->getVacancy($params);
    }

    public function storeVacancy(StoreVacancyRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->storeVacancy($params);
        return response()->json(['message' => 'Success', "data" => $response]);
    }

    public function editVacancy(StoreVacancyRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->editVacancy($params);
        return response()->json(['message' => 'Success', "data" => $response]);
    }

    public function deactivateVacancy(GetVacancyRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->deactivateVacancy($params);
        return response()->json(['message' => 'Success', "data" => $response]);
    }

    public function deleteVacancy(GetVacancyRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->deleteVacancy($params);
        return response()->json(['message' => 'Success', "data" => $response]);
    }

    public function listLocals(ListRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->listLocals($params);
        return response()->json($response);
    }

    public function listWorkModes(ListRequest $request, VacancyInterface $recruitmentService)
    {
        $params = $request->validated();
        $response = $recruitmentService->listWorkModes($params);
        return response()->json($response);
    }
}
