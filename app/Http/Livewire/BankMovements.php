<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lunaris\BankFicheLine;

class BankMovements extends Component
{
    public function render()
    {
        return view('livewire.bank-movements', [
            'bankFicheLines' => BankFicheLine::paginate(10)
        ]);
    }

}
