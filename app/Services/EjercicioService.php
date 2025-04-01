<?php

namespace App\Services;

use App\Contracts\EjercicioServiceInterface;
use App\Models\Ejercicio;

class EjercicioService implements EjercicioServiceInterface
{
    public function getAllEjercicios()
    {
        // Todos los usuarios tienen acceso a todos los ejercicios
        return Ejercicio::all();
    }

    public function createEjercicio(array $data)
    {
        return Ejercicio::create($data);
    }

    public function getEjercicioById($id)
    {
        return Ejercicio::findOrFail($id);
    }

    public function updateEjercicio($id, array $data)
    {
        $ejercicio = $this->getEjercicioById($id);
        $ejercicio->update($data);

        return $ejercicio;
    }

    public function deleteEjercicio($id)
    {
        $ejercicio = $this->getEjercicioById($id);
        $ejercicio->delete();
    }
}

