<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ------- SOFT DELETE ----------
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Careers;
use App\Models\Enrolments;

class Terms extends Model
{
    use HasFactory;
    
    // Enabling soft delete on model
    use SoftDeletes;

    public function enrolments() {
        return $this->hasMany(Enrolments::class);
    }

    public function careers() {
        return $this->hasMany(Careers::class);
    }

}