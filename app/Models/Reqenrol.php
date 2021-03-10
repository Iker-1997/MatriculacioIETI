<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Logs;
use App\Models\Uploads;
use App\Models\Enrolments;


class Reqenrol extends Model
{
    use HasFactory;

    public function logs() {
        return $this->hasMany(Logs::class);
    }

    public function uploads() {
        return $this->hasMany(Uploads::class);
    }

    public function enrolments() {
        return $this->belongsTo(Enrolments::class);
    }
}