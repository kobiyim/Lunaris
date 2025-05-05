<?php

namespace App\Livewire\Card;

use Livewire\Component;
use App\Models\Lunaris\CardTransaction;

class TransactionFiches extends Component
{
    public $confirmingDelete = false;
    public $deleteId;

    public function render()
    {
        return view('card.transactions', [
            'cardTransactions' => CardTransaction::paginate(10)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        BankFiche::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Cari hesap başarıyla silindi.";
    }
}
