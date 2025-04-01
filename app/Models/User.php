<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'fecha_registro'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relaciones con otras tablas
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }

    public function rutinas()
    {
        return $this->hasMany(Rutina::class);
    }

}
