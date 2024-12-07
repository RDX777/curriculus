<?php

namespace App\Interfaces\Recruitment;

interface VacancyInterface
{
    public function list(array $params);
    public function getVacancy(array $params);
    public function storeVacancy(array $params);
    public function editVacancy(array $params);
    public function deactivateVacancy(array $params);
    public function deleteVacancy(array $params);
    public function listLocals(array $params);
    public function listWorkModes(array $params);
}
