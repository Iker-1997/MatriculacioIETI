<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;

    public function terms(){
    	return $this->belongsTo(Terms::class,'term_id');
    }
}
