<?php

namespace App\Services;

use App\Models\Masina;

class MasinaService
{
    public function _construct()
    {
        //
    }

    public function setProperties(Masina $masina, array $properties): void
    {
        if (!empty($properties['idLocatieActuala'])) {
            $masina->idLocatieActuala = $properties['idLocatieActuala'];
        }

        if (!empty($properties['categorie'])) {
            $masina->categorie = $properties['categorie'];
        }

        if (!empty($properties['marca'])) {
            $masina->marca = $properties['marca'];
        }

        if (!empty($properties['model'])) {
            $masina->model = $properties['model'];
        }

        if (!empty($properties['anFabricatie'])) {
            $masina->anFabricatie = $properties['anFabricatie'];
        }

        if (!empty($properties['serieSasiu'])) {
            $masina->serieSasiu = $properties['serieSasiu'];
        }

        if (!empty($properties['serieCarteIdentitate'])) {
            $masina->serieCarteIdentitate = $properties['serieCarteIdentitate'];
        }

        if (!empty($properties['nrInmatriculare'])) {
            $masina->nrInmatriculare = $properties['nrInmatriculare'];
        }

        if (!empty($properties['tipMotor'])) {
            $masina->tipMotor = $properties['tipMotor'];
        }

        if (!empty($properties['tipTransmisie'])) {
            $masina->tipTransmisie = $properties['tipTransmisie'];
        }

        if (!empty($properties['nrPasageri'])) {
            $masina->nrPasageri = $properties['nrPasageri'];
        }

        if (!empty($properties['nrUsi'])) {
            $masina->nrUsi = $properties['nrUsi'];
        }
    }
}
