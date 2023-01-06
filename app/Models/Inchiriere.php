<?php

namespace App\Models;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  App\Models\Client
 * @property int $idInchiriere
 * @property int $idClient
 * @property int $idMasina
 * @property DateTime $dataInchiriere
 * @property DateTime $dataPredareLimita
 * @property DateTime $dataPredareEfectiva
 * @property int $idLocatieInchiriere
 * @property int $idLocatiePredare
 */

class Inchiriere extends Model
{
    use HasFactory;

    protected $table = 'tblInchirirere';

    protected $columns = [
        'idInchiriere' => [
            'label' => 'idInchiriere'
        ],
        'idClient' => [
            'label' => 'idClient'
        ],
        'idMasina' => [
            'label' => 'idMasina'
        ],
        'dataInchiriere' => [
            'label' => 'dataInchiriere'
        ],
        'dataPredareLimita' => [
            'label' => 'dataPredareLimita'
        ],
        'dataPredareEfectiva' => [
            'label' => 'dataPredareEfectiva'
        ],
        'idLocatieInchiriere' => [
            'label' => 'idLocatieInchiriere'
        ],
        'idLocatiePredare' => [
            'label' => 'idLocatiePredare'
        ]
    ];

    protected $primaryKey = 'idInchiriere';
}
