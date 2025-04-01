<?php

namespace App\Contracts;

interface SeguimientoServiceInterface
{
    public function getAllSeguimientos();

    public function getSeguimientoById($id);

    public function createSeguimiento(array $data);

    public function updateSeguimiento($id, array $data);

    public function deleteSeguimiento($id);
}
