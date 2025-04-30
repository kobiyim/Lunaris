<?php

namespace App\Livewire\Invoice\Sales;

use Livewire\Component;
use App\Models\Lunaris\Invoice;
use App\Models\Lunaris\InvoiceDetail;

class Show extends Component
{
    public $invoiceId;

    public function mount($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    public function render()
    {
        return view('invoice.sales.show', [
            'fiches' => Invoice::find($this->invoiceId)
        ]);
    }
}