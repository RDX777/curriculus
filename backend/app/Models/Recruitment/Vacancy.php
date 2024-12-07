<?php

namespace App\Models\Recruitment;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    use HasFactory;
    protected $connection = 'recruitments';
    protected $table = 'vacancies';

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id', 'work_mode_id', 'title', 'short_description', 'long_description'];

    protected function active(): Attribute
    {
        return Attribute::make(
            get: fn(int $value) => (bool) $value,
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    public function work_mode(): BelongsTo
    {
        return $this->belongsTo(WorkMode::class, "work_mode_id", "id");
    }
}
