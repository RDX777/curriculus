<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Recruitment\Resume;
use App\Models\Recruitment\TypeRecruitmentStage;


class RecruitmentStage extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'recruitment_stages';

    protected $fillable = ['type_recruitment_stage_id', 'description', 'allow_jump', 'allow_date', 'active'];

    public function typeRecruitmentStage(): BelongsTo {
        return $this->belongsTo(TypeRecruitmentStage::class, "type_recruitment_stage_id", "id");
    }

    public function resumes(): HasMany {
        return $this->hasMany(Resume::class, "last_recruitment_stage_id", "id");
    }

}
