<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Recruitment\Resume;
use App\Models\Recruitment\Vacancy;

class Candidate extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'candidates';

    protected $fillable = ['uuid', 'name', 'cpf', 'email', 'phone', 'cep'];

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, "company_id", "id");
    }

    public function resumes(): HasMany {
        return $this->hasMany(Resume::class, "candidate_id", "id");
    }
}
