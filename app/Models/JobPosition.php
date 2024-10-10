<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'id_company',
        'id_division',
        'name',
        'description'
    ];
}
