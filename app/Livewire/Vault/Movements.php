<?php

namespace App\Livewire\Vault;

use Livewire\Component;
use App\Models\Lunaris\VaultFicheLine;

class Movements extends Component
{
    public function render()
    {
        return view('bank.movements', [
            'vaultFicheLines' => VaultFicheLine::paginate(10)
        ]);
    }

}
