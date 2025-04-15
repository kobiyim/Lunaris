<?php

namespace App\Livewire;

use App\Models\BankFicheLine;
use App\Models\BankAccount;
use App\Models\Card;
use Livewire\Component;

class BankFicheLineManager extends Component
{
    public $bankFicheId;

    public $lineId, $bank_account_id, $card_id, $line_number, $description, $amount;
    public $editing = false;
    public $confirmingDelete = false;

    protected $rules = [
        'bank_account_id' => 'nullable|integer|exists:bank_accounts,id',
        'card_id' => 'nullable|integer|exists:cards,id',
        'line_number' => 'nullable|integer',
        'description' => 'nullable|string|max:128',
        'amount' => 'nullable|numeric',
    ];

    public function mount($bankFicheId)
    {
        $this->bankFicheId = $bankFicheId;
    }

    public function render()
    {
        return view('livewire.bank-fiche-line-manager', [
            'lines' => BankFicheLine::where('bank_fiche_id', $this->bankFicheId)->orderBy('line_number')->get(),
            'bankAccounts' => BankAccount::all(),
            'cards' => Card::all(),
        ]);
    }

    public function save()
    {
        $this->validate();

        BankFicheLine::updateOrCreate(
            ['id' => $this->lineId],
            [
                'bank_fiche_id' => $this->bankFicheId,
                'bank_account_id' => $this->bank_account_id,
                'card_id' => $this->card_id,
                'line_number' => $this->line_number,
                'description' => $this->description,
                'amount' => $this->amount,
            ]
        );

        session()->flash('message', $this->lineId ? 'Satır güncellendi.' : 'Satır eklendi.');
        $this->resetForm();
    }

    public function edit($id)
    {
        $line = BankFicheLine::findOrFail($id);
        $this->lineId = $line->id;
        $this->bank_account_id = $line->bank_account_id;
        $this->card_id = $line->card_id;
        $this->line_number = $line->line_number;
        $this->description = $line->description;
        $this->amount = $line->amount;
        $this->editing = true;
    }

    public function confirmDelete($id)
    {
        $this->lineId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        BankFicheLine::destroy($this->lineId);
        session()->flash('message', 'Satır silindi.');
        $this->confirmingDelete = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->lineId = null;
        $this->bank_account_id = null;
        $this->card_id = null;
        $this->line_number = null;
        $this->description = '';
        $this->amount = null;
        $this->editing = false;
    }
}
