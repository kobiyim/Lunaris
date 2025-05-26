<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashItem extends Model
{
    use HasFactory;

    protected $table = 'lunaris_cash_items';

    protected $fillable = [
        'doc',
        'current_status',
        'seri_number',
    ];

    public $timestamps = false;
}
