<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constat extends Model
{
    use HasFactory;
    protected $table='constats';
    protected $fillable =[
       'type',
        'objet',
        'audit_id',
    ];
}
