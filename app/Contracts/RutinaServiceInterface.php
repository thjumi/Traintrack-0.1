<?php

namespace App\Contracts;

interface RutinaServiceInterface
{
    public function getAllRutinas();

    public function createRutina(array $data);

    public function getRutinaById($id);

    public function updateRutina($id, array $data);

    public function deleteRutina($id);
}
