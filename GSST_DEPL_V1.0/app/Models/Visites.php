<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visites extends Model
{
    use HasFactory;
    protected $table='visites';
    protected $fillable =[
        'travailleur_id',
        'dateVisite',
        'resultat',
        'recommendation',
    ];
}