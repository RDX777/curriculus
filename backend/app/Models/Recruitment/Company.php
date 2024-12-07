<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recruitment\Vacancy;

class Company extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'companies';

    protected $fillable = ['name', 'cnpj', 'local', 'active', 'deleted'];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, "company_id", "id");
    }
}
