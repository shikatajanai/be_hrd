<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobLevel extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'id_user',
        'id_company',
        'job_code',
        'job_name',
        'description'
    ];
}
