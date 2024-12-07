<?php

namespace App\Interfaces\Recruitment;

interface RecruitmentStageInterface
{
    public function list($params);
    public function listCandidateByStage($params);
}
