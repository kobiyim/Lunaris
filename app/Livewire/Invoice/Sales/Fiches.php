<?php

namespace App\Livewire\Invoice\Sales;

use App\Models\Lunaris\Invoice;
use Livewire\Component;

class Fiches extends Component
{
    public $confirmingDelete = false;

    public $deleteId;

    public function render()
    {
        return view('invoice.sales.list', [
            'fiches' => Invoice::whereIn('type', [1, 3])->orderBy('date_', 'desc')->paginate(10),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $invoice = Invoice::findOrFail($this->deleteId);

        $invoice->details()->delete();
        $invoice->delete();

        $this->confirmingDelete = false;
        $this->successMessage = 'Fatura başarıyla silindi.';
    }
}
