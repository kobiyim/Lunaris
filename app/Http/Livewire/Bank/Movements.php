<?php

namespace App\Http\Livewire\Bank;

use Livewire\Component;
use App\Models\Lunaris\BankFicheLine;

class Movements extends Component
{
    public function render()
    {
        return view('livewire.bank-movements', [
            'bankFicheLines' => BankFicheLine::paginate(10)
        ]);
    }

}
