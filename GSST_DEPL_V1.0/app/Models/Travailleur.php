<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visites;

class travailleur extends Model
{
    use HasFactory;
    protected $table='travailleur';
    protected $fillable =[
        'cin',
        'nom',
        'prenom',
        'tel',
        'email',
        'sexe',
        'dateNaissance',
        'lieuNaissance',
        'adresse',
        'situation',
        'fonction',
        'image_profile',
        'group_sanguin',
        'affeliation_cnops'
    ];
}
