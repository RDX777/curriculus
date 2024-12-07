<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Recruitment\RecruitmentStage;

class ResumeStageHistory extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'resume_stage_histories';

    protected $fillable = ['candidate_id', 'uuid_vacancy', 'recruitment_stage_id', 'resume_id', 'observation', 'login_user', 'name_user', 'start_in', 'end_in'];

    public function recruitmentStage(): BelongsTo {
        return $this->belongsTo(RecruitmentStage::class, "recruitment_stage_id", "id");
    }
}
