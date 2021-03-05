<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolments extends Model
{
    use HasFactory;
    public function user(){
    	return $this->belongsTo(Users::class,'user_id');
    }
    public function terms(){
    	return $this->belongsTo(Terms::class,'term_id');
    }
    public function careers(){
    	return $this->belongsTo(Careers::class,'career_id');
    }
}
