<?php

namespace App\Models\ExternalCredentials;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalCredentials extends Model
{
    use HasFactory;
    protected $connection = 'credentials';
    protected $table = 'settings';
    public $timestamps = false;
}
