<?php

namespace App\Livewire\Invoice\Sales;

use Livewire\Component;
use App\Models\Lunaris\Invoice;
use App\Models\Lunaris\InvoiceDetail;

class Fiches extends Component
{
    public $confirmingDelete = false;
    public $deleteId;

    public function render()
    {
        return view('invoice.sales.list', [
            'fiches' => Invoice::whereIn('type', [ 1, 3 ])->paginate(10)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Invoice::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Fatura başarıyla silindi.";
    }
}