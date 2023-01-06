<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *  App\Models\Client
 * @property int $idPlata
 * @property string $tipPlata
 * @property int $idInchiriere
 * @property double $suma
 * @property string $statusPlata
 */

class Plata extends Model
{
    use HasFactory;

    protected $table = 'tblPlata';

    protected $columns = [
        'idPlata' => [
            'label' => 'idPlata'
        ],
        'tipPlata' => [
            'label' => 'tipPlata'
        ],
        'idInchiriere' => [
            'label' => 'idInchiriere'
        ],
        'suma' => [
            'label' => 'suma'
        ],
        'statusPlata' => [
            'label' => 'statusPlata'
        ]
    ];

    protected $primaryKey = 'idPlata';

    /**
     * @return BelongsTo
     */
    public function inchiriere(): BelongsTo
    {
        return $this->belongsTo(
            Inchiriere::Class,
            'idPlata',
            'idLocatie'
        );
    }
}
