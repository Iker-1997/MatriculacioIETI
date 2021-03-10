<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Career;
use App\Models\Terms;
use App\Models\User;
use App\Models\Enrolmentufs;
use App\Models\Reqenrol;


class Enrolments extends Model
{
    use HasFactory;

    public function careers() {
        return $this->belongsTo(Careers::class);
    }

    public function terms() {
        return $this->belongsTo(Terms::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function enrolment_ufs() {
        return $this->hasMany(Enrolmentufs::class);
    }

    public function req_enrols() {
        return $this->hasMany(Reqenrol::class);
    }
}
