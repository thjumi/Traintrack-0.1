<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';
    protected $fillable = ['nombre', 'descripcion', 'grupoMuscular', 'dificultad'];

    public function rutinas()
    {
        return $this->belongsToMany(Rutina::class, 'ejercicios_rutinas')
                    ->withPivot('repeticiones', 'series', 'descansos')
                    ->withTimestamps();
    }
}
