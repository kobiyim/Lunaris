<?php

namespace App\Models\Lunaris;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'lunaris_invoice_details';

    protected $fillable = [
        'invoice_id',
        'stock_id',
        'unit_id',
        'quantity',
        'description',
        'price',
        'total',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}