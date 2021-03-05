<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufs extends Model
{
    use HasFactory;

    public function mps(){
    	return $this->belongsTo(Mps::class,'mp_id');
    }
}
