<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Auth\Role;

class Middleware extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'middlewares';
    public $timestamps = false;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
