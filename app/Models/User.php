<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// ----- SOFT DELETE -----
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Enrolments;
use App\Models\Records;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Enabling soft delete on model
    use SoftDeletes;

    public function enrolments() {
        return $this->belongsTo(Enrolments::class);
    }

    public function records() {
        return $this->belongsTo(Records::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public function hasRole($role) {     
        $role = (array)$role;    
      
        return in_array($this->role, $role); 
     }
}