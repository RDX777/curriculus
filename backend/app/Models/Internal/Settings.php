<?php

namespace App\Models\Internal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $connection = 'rpa';
    protected $table = 'configuracoes';
}
