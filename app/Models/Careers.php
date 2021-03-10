<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Terms;
use App\Models\Enrolments;
use App\Models\Mps;


class Careers extends Model
{
    use HasFactory;

    public function terms() {
        return $this->belongsTo(Terms::class);
    }

    public function enrolments() {
        return $this->hasMany(Enrolments::class);
    }

    public function mps() {
        return $this->hasMany(Mps::class);
    }
}