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
        'date_',
        'description',
        'type',
        'sign',
        'total',
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    protected function casts(): array
    {
        return [
            'date_' => 'date',
        ];
    }
}