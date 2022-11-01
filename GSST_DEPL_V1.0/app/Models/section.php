<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;
use App\Models\question;


class section extends Model
{
    use HasFactory;
    protected $table='sections';
    protected $fillable =[
        'titre',
        'ordre',
        'Questionnaire_id'
    ];
    public function Questionnaire()
    {
    	return $this->belongsTo(Questionnaire::class);
    }
    public function  questions(){
        return $this->hasMany(question::class);
    }
}
