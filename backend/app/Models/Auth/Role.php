<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Action;
use App\Models\Auth\Menu;
use App\Models\Auth\Middleware;

class Role extends Model
{
    use HasFactory;

    protected $connection = 'application';
    protected $table = 'roles';
    public $timestamps = false;

    public function actions(): BelongsToMany
    {
        return $this->belongsToMany(Action::class);
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class);
    }

    public function middlewares(): BelongsToMany
    {
        return $this->belongsToMany(Middleware::class);
    }
}
