<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionRole extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'action_role';
    protected $fillable = ['role_id', 'action_id'];
}
