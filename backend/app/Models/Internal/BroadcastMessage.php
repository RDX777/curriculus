<?php

namespace App\Models\Internal;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BroadcastMessage extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'broadcast_messages';
    protected $fillable = ['description', 'public'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
