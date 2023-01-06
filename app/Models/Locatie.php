<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *  App\Models\Client
 * @property int $idLocatie
 * @property string $adresa
 * @property string $codPostal
 * @property string $email
 * @property string $nrTelefon
 */

class Locatie extends Model
{
    use HasFactory;

    protected $table = 'tblLocatie';

    protected $columns = [
        'idLocatie' => [
            'label' => 'idLocatie'
        ],
        'adresa' => [
            'label' => 'adresa'
        ],
        'codPostal' => [
            'label' => 'codPostal'
        ],
        'email' => [
            'label' => 'email'
        ],
        'nrTelefon' => [
            'label' => 'nrTelefon'
        ]
    ];

    protected $primaryKey = 'idLocatie';

    /**
     * @return HasMany
     */
    public function inchirieri(): HasMany
    {
        return $this->hasMany(
            Inchiriere::Class,
            '$idLocatie',
            'idLocatieInchiriere'
        );
    }
}
