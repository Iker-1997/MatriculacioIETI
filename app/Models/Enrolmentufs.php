<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ufs;
use App\Models\Enrolments;


class Enrolmentufs extends Model
{
    use HasFactory;

    public function enrolments() {
        return $this->belongsTo(Enrolments::class);
    }

    public function ufs() {
        return $this->belongsTo(Enrolmentufs::class);
    }

}