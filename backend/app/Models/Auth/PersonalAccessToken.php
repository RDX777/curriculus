<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;
    protected $connection = 'application';
    protected $table = 'personal_access_tokens';
    public $timestamps = false;
}
