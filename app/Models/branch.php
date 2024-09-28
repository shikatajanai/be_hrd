<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'company_id',
        'name',
        'address',
        'phone',
        'description',
    ];
}
