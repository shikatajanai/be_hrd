<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'id_company',
        'name',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];
}
