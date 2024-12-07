<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

use App\Models\Auth\Role;
use App\Models\Auth\Route;

class Menu extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'menus';
    public $timestamps = false;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function route(): HasOne
    {
        return $this->hasOne(Route::class);
    }
}
