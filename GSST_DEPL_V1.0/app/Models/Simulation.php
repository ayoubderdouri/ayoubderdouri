<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory;
    protected $table='Simulation';
    protected $fillable=[
        'domaine',
        'theme',
        'superviseur',
        'duree',
        'participant',
        'date',
        'rapport',
    ];
}
