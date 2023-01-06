<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *  App\Models\Client
 * @property int $idMasina
 * @property int $idLocatieActuala
 * @property string $categorie
 * @property string $marca
 * @property string $model
 * @property int $anFabricatie
 * @property string $serieSasiu
 * @property string $serieCarteIdentitate
 * @property string $nrInmatriculare
 * @property string $tipMotor
 * @property string $tipTransmisie
 * @property int $nrPasageri
 * @property int $nrUsi
 */

class Masina extends Model
{
    use HasFactory;

    protected $table = 'tblMasina';

    protected $columns = [
        'idMasina' => [
            'label' => 'idMasina'
        ],
        'idLocatieActuala' => [
            'label' => 'idLocatieActuala'
        ],
        'categorie' => [
            'label' => 'categorie'
        ],
        'marca' => [
            'label' => 'marca'
        ],
        'model' => [
            'label' => 'model'
        ],
        'anFabricatie' => [
            'label' => 'anFabricatie'
        ],
        'serieSasiu' => [
            'label' => 'serieSasiu'
        ],
        'serieCarteIdentitate' => [
            'label' => 'serieCarteIdentitate'
        ],
        'nrInmatriculare' => [
            'label' => 'nrInmatriculare'
        ],
        'tipMotor' => [
            'label' => 'tipMotor'
        ],
        'tipTransmisie' => [
            'label' => 'tipTransmisie'
        ],
        'nrPasageri' => [
            'label' => 'nrPasageri'
        ],
        'nrUsi' => [
            'label' => 'nrUsi'
        ]
    ];

    protected $primaryKey = 'idMasina';

    /**
     * @return BelongsToMany
     */
    public function clienti(): BelongsToMany
    {
        return $this->belongsToMany(
            Client::Class,
            'tblInchiriere',
            'idMasina',
            'idClient',
        );
    }
}
