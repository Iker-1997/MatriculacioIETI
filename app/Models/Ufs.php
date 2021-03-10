<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mps;
use App\Models\Records;
use App\Models\Enrolmentufs;


class Uf extends Model
{
    use HasFactory;

    public function mps() {
        return $this->belongsTo(Mps::class);
    }

    public function records() {
        return $this->hasMany(Records::class);
    }

    public function enrolmentufs() {
        return $this->hasMany(Enrolmentufs::class);
    }

}