<?php

namespace App\Livewire\Invoice\Sales;

use Livewire\Component;
use App\Models\Lunaris\Invoice;
use App\Models\Lunaris\InvoiceDetail;

class Show extends Component
{
    public $invoice;

    public function mount($salesId)
    {
        $this->invoice = Invoice::find($salesId);
    }

    public function render()
    {
        return view('invoice.sales.show');
    }
}