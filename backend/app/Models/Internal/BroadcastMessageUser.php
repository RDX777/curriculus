<?php

namespace App\Models\Internal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastMessageUser extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'broadcast_message_user';
    protected $fillable = ['user_id', 'broadcast_message_id', 'read'];

    /**
     * Accessor to convert the 'read' attribute to boolean.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function getReadAttribute($value): bool
    {
        return (bool) $value;
    }
}
