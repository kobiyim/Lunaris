<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankFiche extends Model
{
    protected $table = 'lunaris_bank_fiches';

    protected $fillable = [
        'date_',
        'ficheno',
        'transaction',
        'sign',
        'total',
        'description',
    ];

    protected $casts = [
        'date_' => 'date',
        'total' => 'float',
    ];

    public function lines(): HasMany
    {
        return $this->hasMany(BankFicheLine::class, 'bank_fiche_id');
    }
}
