<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunite extends Model
{
    use HasFactory;
    protected $table='opportunite';
    protected $fillable =[
      'processus',
        'objet',
      'benifice',
      'profit',
      'facilite',
      'priorite',
    ];
}
