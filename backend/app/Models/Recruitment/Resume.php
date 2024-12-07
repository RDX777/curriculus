<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Recruitment\Candidate;
use App\Models\Recruitment\Vacancy;
use App\Models\Recruitment\RecruitmentStage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'resumes';

    protected $fillable = ['candidate_id', 'uuid_vacancy', 'last_recruitment_stage_id', 'indicated_by', 'professional_summary', 'academic_background', 'professional_experience', 'additional_information', 'file', 'consent'];

    protected function consent(): Attribute
    {
        return Attribute::make(
            get: fn(int $value) => (bool)$value,
            set: fn(bool $value) => (int) $value
        );
    }

    public function candidate(): BelongsTo {
        return $this->belongsTo(Candidate::class, "candidate_id", "id");
    }

    public function vacancy(): BelongsTo {
        return $this->belongsTo(Vacancy::class, "uuid_vacancy", "uuid");
    }

    public function recruitmentStage(): BelongsTo {
        return $this->belongsTo(RecruitmentStage::class, "last_recruitment_stage_id", "id");
    }
    
}
