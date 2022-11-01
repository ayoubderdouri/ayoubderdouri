<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class processus extends Model
{
    use HasFactory;
    protected $table='processus';
    protected $fillable =[
      'user_id',
      'nomProcessus',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
}
