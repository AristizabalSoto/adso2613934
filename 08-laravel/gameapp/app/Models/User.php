<?php

// Ubicación del archivo: app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modelo de usuario.
 *
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'document', // Agregado aquí
        'fullname',
        'gender',
        'email',
        'phone',
        'birthdate',
        'password',
        'photo',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function games() {
        return $this->hasMany('App\Models\Game');
    }

    public function collections() {
        return $this->hasMany('App\Models\Collection');
    }
}
