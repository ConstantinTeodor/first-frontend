<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 *  App\Models\Client
 * @property int $idClient
 * @property string $CNP
 * @property string $nume
 * @property string $prenume
 * @property string $nrTelefon
 * @property string $email
 */

class Client extends Model
{
    use HasFactory;

    public function _construct()
    {
        $this->connection = env('DB_CONNECTION');
        $this->table = env('DB_DATABASE') . '.' . 'tblClient';
        $this->primaryKey = 'idClient';
        $this->guarded = ['idClient'];
    }

    /**
     * @return BelongsToMany
     */
    public function masini(): BelongsToMany
    {
        return $this->belongsToMany(
            Masina::Class,
            'tblInchiriere',
            'idClient',
            'idMasina'
        );
    }
}
