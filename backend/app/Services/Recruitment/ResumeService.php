<?php

namespace App\Services\Recruitment;

use App\Interfaces\Recruitment\ResumeInterface;

use App\Models\Recruitment\Resume;

use function App\Helpers\userCanAction;

class ResumeService implements ResumeInterface
{

    public function search(array $item)
    {
        userCanAction("can-curriculus-resume-search");

        $itemToSearch = "%" . $item["item"] . "%";

        $candidate = Resume::with("candidate", "vacancy", "recruitmentStage")
            ->whereHas('candidate', function ($query) use ($itemToSearch) {
                $query->where('name', 'like', $itemToSearch)
                    ->orWhere('cpf', 'like', $itemToSearch)
                    ->orWhere('email', 'like', $itemToSearch)
                    ->orWhere('phone', 'like', $itemToSearch)
                    ->orWhere('cep', 'like', $itemToSearch);
            })
            ->limit(100)
            ->get();

        return $candidate;
    }

    public function searchByUuid(array $item)
    {
        userCanAction("can-curriculus-resume-searchByUuid");

        return Resume::with("candidate", "vacancy", "recruitmentStage")
            ->where("uuid", "=", $item["uuid"])
            ->first();

    }
}
