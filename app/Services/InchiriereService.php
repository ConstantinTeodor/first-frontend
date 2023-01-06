<?php

namespace App\Services;

use App\Models\Inchiriere;

class InchiriereService
{
    public function _construct()
    {
        //
    }

    public function setProperties(Inchiriere $inchiriere, array $properties): void
    {
        if (!empty($properties['idClient'])) {
            $inchiriere->idClient = $properties['idClient'];
        }

        if (!empty($properties['idMasina'])) {
            $inchiriere->idMasina = $properties['idMasina'];
        }

        if (!empty($properties['dataInchiriere'])) {
            $inchiriere->dataInchiriere = $properties['dataInchiriere'];
        }

        if (!empty($properties['dataPredareLimita'])) {
            $inchiriere->dataPredareLimita = $properties['dataPredareLimita'];
        }

        if (!empty($properties['dataPredareEfectiva'])) {
            $inchiriere->dataPredareEfectiva = $properties['dataPredareEfectiva'];
        }

        if (!empty($properties['idLocatieInchiriere'])) {
            $inchiriere->idLocatieInchiriere = $properties['idLocatieInchiriere'];
        }

        if (!empty($properties['idLocatiePredare'])) {
            $inchiriere->idLocatiePredare = $properties['idLocatiePredare'];
        }
    }
}
