<?php

namespace App\Interfaces\Recruitment;

interface CandidateInterface
{
    public function candidateList();
    public function getPreviousVacancies($params);
    public function getResumeStageHistory($params);
    public function storeCandidate(array $params);
    public function downloadResume(string $fileName);
}
