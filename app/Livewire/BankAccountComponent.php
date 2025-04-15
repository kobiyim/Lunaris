<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BankAccount;
use App\Models\Bank;

class BankAccountComponent extends Component
{
    use WithPagination;

    public $bank_id, $code, $name, $active = 1, $account_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'bank_id' => 'required|exists:banks,id',
        'code' => 'required|max:8',
        'name' => 'required|max:512',
        'active' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.bank-account-component', [
            'bankAccounts' => BankAccount::with('bank')->orderByDesc('id')->paginate(10),
            'banks' => Bank::all(),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['bank_id', 'code', 'name', 'active', 'account_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        BankAccount::create([
            'bank_id' => $this->bank_id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
        ]);

        $this->resetForm();
        $this->dispatchBrowser('modal-close');
        $this->successMessage = "Hesap başarıyla eklendi.";
    }

    public function edit($id)
    {
        $account = BankAccount::findOrFail($id);
        $this->account_id = $id;
        $this->bank_id = $account->bank_id;
        $this->code = $account->code;
        $this->name = $account->name;
        $this->active = $account->active;
        $this->isEditMode = true;

        $this->dispatchBrowser('modal-open');
    }

    public function update()
    {
        $this->validate();

        $account = BankAccount::findOrFail($this->account_id);
        $account->update([
            'bank_id' => $this->bank_id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
        ]);

        $this->resetForm();
        $this->dispatchBrowser('modal-close');
        $this->successMessage = "Hesap başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        BankAccount::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Hesap başarıyla silindi.";
    }
}
