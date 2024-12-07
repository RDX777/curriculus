<?php

namespace App\Services\Recruitment;

use App\Interfaces\Recruitment\VacancyInterface;
use App\Models\Recruitment\Vacancy;

use App\Models\Recruitment\Company;
use App\Models\Recruitment\Resume;
use App\Models\Recruitment\WorkMode;
use App\Models\Recruitment\ResumeStageHistory;

use function App\Helpers\userCanAction;

class VacancyService extends Recruitment implements VacancyInterface
{
    public function list(array $params)
    {
        # userCanAction("can-curriculus-vacancies-list");

        $filterActicve = $this->yesNoAll($params["active"]);

        $vacancies = Vacancy::with("company")
            ->with("work_mode")
            ->whereIn("active", $filterActicve)
            ->where("deleted", "=", "0")
            ->get();

        return $vacancies;
    }

    public function getVacancy(array $params)
    {
        # userCanAction("can-curriculus-vacancies-getVacancy");

        $vacancy = Vacancy::with("company")
            ->with("work_mode")
            ->where("uuid", "=", $params["uuid"])
            ->first();

        return $vacancy;
    }

    public function storeVacancy(array $params)
    {
        userCanAction("can-curriculus-vacancies-storeVacancy");

        $vacancy = Vacancy::create([
            "company_id" => (int) $params["companyId"],
            "work_mode_id" => (int) $params["workModeId"],
            "title" => $params["title"],
            "short_description" => $params["shortDescription"],
            "long_description" => $params["longDescription"]
        ]);
        return $vacancy;
    }

    public function editVacancy(array $params)
    {

        userCanAction("can-curriculus-vacancies-editVacancy");

        $vacancy = Vacancy::where("uuid", "=", $params['uuid'])
            ->update([
                'company_id' => (int) $params['companyId'],
                "work_mode_id" => (int) $params["workModeId"],
                'title' => $params['title'],
                'short_description' => $params['shortDescription'],
                'long_description' => $params['longDescription']
            ]);

        return $vacancy;
    }

    public function deactivateVacancy(array $params)
    {

        userCanAction("can-curriculus-vacancies-deactivateVacancy");

        $item = Vacancy::where('uuid', $params['uuid'])->firstOrFail();
        $item->active = !$item->active;
        $item->save();

        return $item;
    }

    public function deleteVacancy(array $params)
    {

        userCanAction("can-curriculus-vacancies-deleteVacancy");

        $item = Vacancy::where('uuid', $params['uuid'])->firstOrFail();
        $item->deleted = 1;
        $item->save();

        return $item;
    }

    public function listLocals(array $params)
    {
        # userCanAction("can-curriculus-vacancies-listLocals");

        $filterActicve = $this->yesNoAll($params["active"]);

        $company = Company::whereIn("active", $filterActicve)
            ->where("deleted", "=", "0")
            ->get();

        return $company;
    }

    public function listWorkModes(array $params)
    {
        #userCanAction("can-curriculus-vacancies-listWorkModes");

        $filterActicve = $this->yesNoAll($params["active"]);

        $workMode = WorkMode::whereIn("active", $filterActicve)
            ->where("deleted", "=", "0")
            ->get();

        return $workMode;
    }
}
