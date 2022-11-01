<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conjointe extends Model
{
    use HasFactory;
    protected $table='conjointe';
    protected $fillable =[
        'travailleur_id',
        'type',
        'cin',
        'nom',
        'prenom',
        'tel',
        'email',
        'dateNaissance',
        'lieuNaissance'
    ];
}
