<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reqenrol;

class Uploads extends Model
{
    use HasFactory;

    public function reqenrols() {
        return $this->belongsTo(Reqenrol::class);
    }
}