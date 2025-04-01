<?php

namespace App\Services;

use App\Contracts\RutinaServiceInterface;
use App\Models\Rutina;

class RutinaService implements RutinaServiceInterface
{
    public function getAllRutinas()
    {
        // Devuelve todas las rutinas, ya que no hay distinción de roles.
        return Rutina::all();
    }

    public function createRutina(array $data)
    {
     
        return Rutina::create($data);
    }

    public function getRutinaById($id)
    {
        // Devuelve la rutina con el ID especificado.
        return Rutina::findOrFail($id);
    }

    public function updateRutina($id, array $data)
    {
        // Actualiza la rutina sin verificar roles específicos.
        $rutina = $this->getRutinaById($id);
        $rutina->update($data);

        return $rutina;
    }

    public function deleteRutina($id)
    {
        // Elimina la rutina sin restricciones adicionales.
        $rutina = $this->getRutinaById($id);
        $rutina->delete();
    }
}
