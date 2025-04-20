<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lunaris\BankFiche;

class BankFiches extends Component
{
    public $confirmingDelete = false;
    public $deleteId;

    public function render()
    {
        return view('livewire.bank-fiches', [
            'bankFiches' => BankFiche::paginate(10)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Card::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Cari hesap başarıyla silindi.";
    }
}
