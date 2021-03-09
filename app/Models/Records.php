<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Ufs;

class Records extends Model
{
    use HasFactory;
    
    public function users() {
        return $this->belongsTo(User::class);
    }

    public function ufs() {
        return $this->belongsTo(Ufs::class);
    }
}
