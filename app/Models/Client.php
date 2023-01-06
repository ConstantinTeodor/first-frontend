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

    protected $table = 'tblClient';

    protected $columns = [
        'idClient' => [
            'label' => 'idClient'
        ],
        'CNP' => [
            'label' => 'CNP'
        ],
        'nume' => [
            'label' => 'nume'
        ],
        'prenume' => [
            'label' => 'prenume'
        ],
        'nrTelefon' => [
            'label' => 'nrTelefon'
        ],
        'email' => [
            'label' => 'email'
        ]
    ];

    protected $primaryKey = 'idClient';

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
