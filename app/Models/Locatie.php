<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *  App\Models\Client
 * @property int $idLocatie
 * @property string $adresa
 * @property int $codPostal
 * @property string $email
 * @property string $nrTelefon
 */

class Locatie extends Model
{
    use HasFactory;

    public function _construct()
    {
        $this->connection = env('DB_CONNECTION');
        $this->table = env('DB_DATABASE') . '.' . 'tblLocatie';
        $this->primaryKey = 'idLocatie';
        $this->guarded = ['idLocatie'];
    }

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
