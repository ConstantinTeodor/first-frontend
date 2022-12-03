<?php

namespace App\Services;

use App\Models\Plata;

class PlataService
{
    public function _construct()
    {
        //
    }

    public function setProperties(Plata $plata, array $properties): void
    {
        if (!empty($properties['idPlata'])) {
            $plata->idPlata = $properties['idPlata'];
        }

        if (!empty($properties['tipPlata'])) {
            $plata->tipPlata = $properties['tipPlata'];
        }

        if (!empty($properties['idInchiriere'])) {
            $plata->idInchiriere = $properties['idInchiriere'];
        }

        if (!empty($properties['suma'])) {
            $plata->suma = $properties['suma'];
        }

        if (!empty($properties['statusPlata'])) {
            $plata->statusPlata = $properties['statusPlata'];
        }
    }
}
