<?php

namespace App\Services;

use App\Contracts\SeguimientoServiceInterface;
use App\Models\Seguimiento;

class SeguimientoService implements SeguimientoServiceInterface
{
    public function getAllSeguimientos()
    {
        // Devuelve todos los seguimientos, ya que no hay distinción de roles.
        return Seguimiento::all();
    }

    public function getSeguimientoById($id)
    {
        // Obtiene el seguimiento por ID directamente.
        return Seguimiento::findOrFail($id);
    }

    public function createSeguimiento(array $data)
    {
        // Crea un seguimiento con los datos proporcionados.
        return Seguimiento::create($data);
    }

    public function updateSeguimiento($id, array $data)
    {
        // Actualiza el seguimiento por ID.
        $seguimiento = $this->getSeguimientoById($id);
        $seguimiento->update($data);

        return $seguimiento;
    }

    public function deleteSeguimiento($id)
    {
        // Elimina el seguimiento por ID.
        $seguimiento = $this->getSeguimientoById($id);
        $seguimiento->delete();
    }
}
