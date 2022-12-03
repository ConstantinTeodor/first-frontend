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

Class Masina extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    private $guarded;

    public function _construct()
    {
        $this->connection = env('DB_CONNECTION');
        $this->table = env('DB_DATABASE') . '.' . 'tblMasina';
        $this->primaryKey = 'idMasina';
        $this->guarded = ['idMasina'];
    }

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
