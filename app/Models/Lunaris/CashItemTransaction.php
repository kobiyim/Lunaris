<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashItemTransaction extends Model
{
    use HasFactory;

    protected $table = 'lunaris_cash_item_transactions';

    protected $fillable = [
        'cash_item_id',
        'payroll_id',
    ];

    public $timestamps = false;
}
