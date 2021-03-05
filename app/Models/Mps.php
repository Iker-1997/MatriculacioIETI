<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Carrers;
use App\Models\Ufs;


class Mps extends Model
{
    use HasFactory;

    public function careers() {
        return $this->belongsTo(Carrers::class);
    }

    public function ufs() {
        return $this->hasMany(Ufs::class);
    }

}
