<?php

namespace App\Livewire\Bank;

use Livewire\Component;
use App\Models\Lunaris\BankFiche;

class Fiches extends Component
{
    public $confirmingDelete = false;
    public $deleteId;

    public function render()
    {
        return view('bank.fiches', [
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
        BankFiche::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Cari hesap başarıyla silindi.";
    }
}
