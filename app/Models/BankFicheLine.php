<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankFicheLine extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'bank_account_id',
        'card_id',
        'bank_fiche_id',
        'line_number',
        'description',
        'amount',
    ];

    public function fiche()
    {
        return $this->belongsTo(BankFiche::class, 'bank_fiche_id');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
