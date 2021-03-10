<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reqenrol;
use App\Models\Profilereq;

class Requirement extends Model
{
    use HasFactory;

    public function reqenrols() {
        return $this->hasMany(Reqenrol::class);
    }

    public function profilereqs() {
        return $this->belongsTo(Profilereq::class);
    }
}