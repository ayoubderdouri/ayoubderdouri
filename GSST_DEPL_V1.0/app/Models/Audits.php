<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audits extends Model
{
    use HasFactory;
    protected $table='audits';
    protected $fillable =[
       'type',
        'rapportPath',
        'date_audits',
    ];
}
