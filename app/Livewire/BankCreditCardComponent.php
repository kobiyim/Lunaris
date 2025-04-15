<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BankCreditCard;
use App\Models\BankAccount;

class BankCreditCardComponent extends Component
{
    use WithPagination;

    public $bank_account_id, $card_number, $expiry_date, $cut_off_date, $credit_card_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'bank_account_id' => 'required|exists:bank_accounts,id',
        'card_number' => 'required|max:64',
        'expiry_date' => 'required|date',
        'cut_off_date' => 'required|date',
    ];

    public function render()
    {
        return view('livewire.bank-credit-card-component', [
            'creditCards' => BankCreditCard::orderByDesc('id')->paginate(10),
            'bankAccounts' => BankAccount::all(),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['bank_account_id', 'card_number', 'expiry_date', 'cut_off_date', 'credit_card_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        BankCreditCard::create([
            'bank_account_id' => $this->bank_account_id,
            'card_number' => $this->card_number,
            'expiry_date' => $this->expiry_date,
            'cut_off_date' => $this->cut_off_date,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Kredi kartı başarıyla eklendi.";
    }

    public function edit($id)
    {
        $creditCard = BankCreditCard::findOrFail($id);
        $this->credit_card_id = $id;
        $this->bank_account_id = $creditCard->bank_account_id;
        $this->card_number = $creditCard->card_number;
        $this->expiry_date = $creditCard->expiry_date;
        $this->cut_off_date = $creditCard->cut_off_date;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $creditCard = BankCreditCard::findOrFail($this->credit_card_id);
        $creditCard->update([
            'bank_account_id' => $this->bank_account_id,
            'card_number' => $this->card_number,
            'expiry_date' => $this->expiry_date,
            'cut_off_date' => $this->cut_off_date,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Kredi kartı başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        BankCreditCard::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Kredi kartı başarıyla silindi.";
    }
}
