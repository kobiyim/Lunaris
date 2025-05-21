<?php

namespace App\Livewire\Invoice\Purchase;

use App\Models\Lunaris\Invoice;
use Livewire\Component;

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
            'fiches' => Invoice::find($this->invoiceId),
        ]);
    }
}
