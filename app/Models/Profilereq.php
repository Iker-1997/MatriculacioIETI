<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// ------- SOFT DELETE ----------
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Requirements;

class Profilereq extends Model
{
    protected $table = 'profilereq';
    use HasFactory;

    // Enabling soft delete on model
    use SoftDeletes;

    public function requirements() {
        return $this->hasMany(Requirements::class);
    }
   
}
