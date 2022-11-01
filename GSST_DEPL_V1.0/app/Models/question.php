<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\section;


class question extends Model
{
    use HasFactory;
    protected $table='questions';
    protected $fillable=[
       'section_id',
      'question'
    ];
    public function sections()
    {
    	return $this->belongsTo(section::class);
    }
}
