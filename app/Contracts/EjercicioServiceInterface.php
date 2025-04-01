<?php

namespace App\Contracts;

interface EjercicioServiceInterface
{
    public function getAllEjercicios();

    public function createEjercicio(array $data);

    public function getEjercicioById($id);

    public function updateEjercicio($id, array $data);

    public function deleteEjercicio($id);
}
