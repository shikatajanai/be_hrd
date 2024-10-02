<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'id_user',
        'id_company',
        'parent_id',
        'name',
        'description'
    ];
}
