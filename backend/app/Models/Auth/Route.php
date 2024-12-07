<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Auth\MenuModel;

class Route extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'routes';
    public $timestamps = false;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
