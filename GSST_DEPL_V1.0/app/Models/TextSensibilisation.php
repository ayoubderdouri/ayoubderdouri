<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextSensibilisation extends Model
{
    use HasFactory;
    protected $table='text_sensibilisations';
    protected $fillable=['text',];
}
