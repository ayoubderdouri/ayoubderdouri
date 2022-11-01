<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponce_Questionnaire extends Model
{
    use HasFactory;
    protected $table='reponce__questionnaires';
    protected $fillable=[
        'enregistred_at',
        'reponce_path'
    ];
}
