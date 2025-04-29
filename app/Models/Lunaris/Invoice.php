<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'lunaris_invoices';

    protected $fillable = [
        'card_id',
        'invoice_no',
        'date',
        'description',
        'type',
        'sign',
        'total',
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}