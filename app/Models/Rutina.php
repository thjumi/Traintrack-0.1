<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rutina extends Model
{
    use HasFactory;

    protected $table = 'rutinas';
    protected $fillable = ['user_id', 'nombre', 'fechaCreacion', 'descripcion'];

    public function ejercicios()
    {
        return $this->belongsToMany(Ejercicio::class, 'ejercicios_rutinas')
                    ->withPivot('repeticiones', 'series', 'descansos')
                    ->withTimestamps();
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

