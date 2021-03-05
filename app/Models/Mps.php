<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mps extends Model
{
    use HasFactory;

    public function careers(){
    	return $this->belongsTo(Careers::class,'career_id');
    }
}
