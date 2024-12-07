<?php

namespace App\Services\Recruitment;

use App\Interfaces\Recruitment\CandidateInterface;

use App\Models\Recruitment\Candidate;
use App\Models\Recruitment\ResumeStageHistory;
use App\Models\Recruitment\Resume;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

use function App\Helpers\userCanAction;

class CandidateService extends Recruitment implements CandidateInterface
{

    public function candidateList()
    {
        userCanAction("can-curriculus-candidates-list");

        return Candidate::all();

    }

    public function getPreviousVacancies($params)
    {

        userCanAction("can-curriculus-candidates-getPreviousVacancies");

        return Candidate::where("id", "=", $params["candidate-id"])
            ->with("resumes.recruitmentStage.typeRecruitmentStage")
            ->with("resumes.vacancy")
            ->first();

    }

    public function getResumeStageHistory($params)
    {

        userCanAction("can-curriculus-candidates-getResumeStageHistory");

        return ResumeStageHistory::with("recruitmentStage")
            ->where("candidate_id", "=", $params["candidate-id"])
            ->where("uuid_vacancy", "=", $params["vacancy-uuid"])
            ->where("resume_id", "=", $params["resume-id"])
            ->orderBy("updated_at", "ASC")
            ->get();

    }

    private function saveCandidate(array $params)
    {
        return Candidate::updateOrCreate(
            ["cpf" => $params["cpf"]],
            [
                "name" => $params["name"],
                "email" => $params["email"],
                "phone" => $params["phone"],
                "cep" => $params["cep"],
            ]
        );
    }

    private function saveCurriculumFile($file)
    {
        try {
            $filename = time() . '-' . Str::uuid() . '.' . $file->getClientOriginalExtension();

            $path = Storage::disk('external')->putFileAs('', $file, $filename);

            return $path;
        } catch (Exception $e) {
            return null;
        }
    }

    private function saveResume(array $params, Candidate $candidate)
    {
        if ($candidate) {
            if (isset($params["file"])) {
                $filePath = $this->saveCurriculumFile($params["file"]);
                // $params["file"]->store('', 'external');
            }

            return Resume::create([
                "candidate_id" => $candidate->id,
                "uuid_vacancy" => $params["vacancie"],
                "last_recruitment_stage_id" => 1,
                "indicated_by" => $params["indicatedBy"],
                "professional_summary" => $params["professionalSummary"],
                "academic_background" => $params["academicBackground"],
                "professional_experience" => $params["professionalExperience"],
                "additional_information" => $params["additionalInformation"],
                "file" => isset($filePath) ? $filePath : null,
                "consent" => $params["consent"],
            ]);
        }
    }

    public function saveResumeStageHistories(array $params, Candidate $candidate, Resume $resume)
    {

        return ResumeStageHistory::create([
            "candidate_id" => $candidate->id,
            "uuid_vacancy" => $params["vacancie"],
            "recruitment_stage_id" => 1,
            "resume_id" => $resume["id"],
            "observation" => "Candidato se cadastrou"
        ]);
    }

    public function storeCandidate(array $params)
    {
        # userCanAction("can-curriculus-vacancies-storeCandidate");

        $candidate = $this->saveCandidate($params);
        if ($candidate) {
            $resume = $this->saveResume($params, $candidate);
            $this->saveResumeStageHistories($params, $candidate, $resume);
        }

        return $resume;
    }

    public function downloadResume(string $fileName)
    {
        userCanAction("can-curriculus-candidates-downloadResume");

        if (Storage::disk('external')->exists($fileName)) {
            return Storage::disk('external')->download($fileName);
        }

        return response()->json(['error' => 'File not found.'], 204);

    }
}
