<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionMaitrise extends Model
{
    use HasFactory;
    protected $table='ActionMaitrise';
    protected $fillable =[
        'source1',
        'source2',
        'source_id',
        'actuel',
        'prevu',
        'enregistrer_at',
        'responsable',
        'ressource',
        'date_recommande',
        'date_realisation',
        'delay_realisation',
        'efficacite',

    ];
}
