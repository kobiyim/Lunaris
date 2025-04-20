<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankFicheLine extends Model
{
    protected $table = 'lunaris_bank_fiche_lines';

    protected $fillable = [
        'bank_account_id',
        'card_id',
        'bank_fiche_id',
        'description',
        'amount',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public function fiche(): BelongsTo
    {
        return $this->belongsTo(BankFiche::class, 'bank_fiche_id');
    }
}