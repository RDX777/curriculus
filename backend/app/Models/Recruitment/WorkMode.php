<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkMode extends Model
{
    use HasFactory;

    protected $connection = 'recruitments';
    protected $table = 'work_modes';

    protected $fillable = ['name'];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, "company_id", "id");
    }
}
