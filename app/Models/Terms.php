<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Careers;
use App\Models\Enrolments;

class Term extends Model
{
    use HasFactory;

    public function enrolments() {
        return $this->hasMany(Enrolments::class);
    }

    public function careers() {
        return $this->hasMany(Careers::class);
    }

}