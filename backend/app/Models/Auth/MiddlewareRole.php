<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddlewareRole extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'middleware_role';
    protected $fillable = ['role_id', 'middleware_id'];
}
