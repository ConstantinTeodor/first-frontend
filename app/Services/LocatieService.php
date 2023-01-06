<?php

namespace App\Services;

use App\Models\Locatie;

class LocatieService
{
    public function _construct()
    {
        //
    }

    public function setProperties(Locatie $locatie, array $properties): void
    {
        if (!empty($properties['adresa'])) {
            $locatie->adresa = $properties['adresa'];
        }

        if (!empty($properties['codPostal'])) {
            $locatie->codPostal = $properties['codPostal'];
        }

        if (!empty($properties['email'])) {
            $locatie->email = $properties['email'];
        }

        if (!empty($properties['nrTelefon'])) {
            $locatie->nrTelefon = $properties['nrTelefon'];
        }
    }
}
