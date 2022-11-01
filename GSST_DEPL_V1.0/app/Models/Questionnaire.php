<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\section;

class Questionnaire extends Model
{
    use HasFactory;
    protected $table='questionnaires';
    protected $fillable =[
      'titre',
      'description',
      'published',
    ];
    public function section(){
        return $this->hasMany(section::class);

    }
}
