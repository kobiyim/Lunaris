<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCreditCard extends Model
{
    protected $table = 'lunaris_bank_credit_cards';

    use HasFactory;

    protected $fillable = ['bank_account_id', 'card_number', 'expiry_date', 'cut_off_date'];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
