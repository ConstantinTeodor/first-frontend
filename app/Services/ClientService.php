<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function _construct()
    {
        //
    }

    public function setProperties(Client $client, array $properties): void
    {
        if (!empty($properties['CNP'])) {
            $client->CNP = $properties['CNP'];
        }

        if (!empty($properties['nume'])) {
            $client->nume = $properties['nume'];
        }

        if (!empty($properties['prenume'])) {
            $client->prenume = $properties['prenume'];
        }

        if (!empty($properties['nrTelefon'])) {
            $client->nrTelefon = $properties['nrTelefon'];
        }

        if (!empty($properties['email'])) {
            $client->email = $properties['email'];
        }
    }
}
