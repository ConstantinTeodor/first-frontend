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

    public function _construct()
    {
        $this->connection = env('DB_CONNECTION');
        $this->table = env('DB_DATABASE') . '.' . 'tblInchiriere';
        $this->primaryKey = 'idInchiriere';
        $this->guarded = ['idInchiriere'];
    }
}
