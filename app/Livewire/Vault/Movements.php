<?php

namespace App\Livewire\Vault;

use App\Models\Lunaris\VaultFicheLine;
use Livewire\Component;

class Movements extends Component
{
    public function render()
    {
        return view('vault.movements', [
            'vaultFicheLines' => VaultFicheLine::paginate(10),
        ]);
    }
}
