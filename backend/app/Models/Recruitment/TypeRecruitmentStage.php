<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Recruitment\RecruitmentStage;

class TypeRecruitmentStage extends Model
{
    use HasFactory;

    protected $connection = 'recruitments';
    protected $table = 'types_recruitment_stages';

    protected $fillable = ['description', 'active'];

    public function recruitmentStage(): HasMany {
        return $this->hasMany(RecruitmentStage::class, "id", "type_recruitment_stage_id");
    }

}
