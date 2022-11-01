<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risque extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='risque';
    protected $fillable =[
        'processus',
        'titre',
        'danger',
        'priorite',
        'milieu',
        'activite',
        //mesurer
        'duree',
        'frequence',
        'gravite',
        'coeffecient',
        'probabilite',
        'criticite',
    ];
}
