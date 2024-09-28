<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyInfo extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        //province, city, industry, company size, npwp, taxable, tax_name, hq_initial, umr, umr_province, bpjs_kesehatan, bpjs_ketenagakerjaan, logo, signature
        'province',
        'city',
        'industry',
        'company_size',
        'npwp',
        'taxable',
        'tax_name',
        'hq_initial',
        'umr',
        'umr_province',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'logo',
        'signature'
    ];
}
