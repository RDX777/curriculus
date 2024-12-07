<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'menu_role';
    protected $fillable = ['role_id', 'menu_id'];
}
