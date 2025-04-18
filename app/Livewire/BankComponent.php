<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bank;

class BankComponent extends Component
{
    use WithPagination;

    public $code, $name, $active = 1, $bank_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8|unique:banks,code',
        'name' => 'required|max:128',
        'active' => 'boolean',
    ];

    public function render()
    {
        $banks = Bank::orderBy('id', 'desc')->paginate(10);
        return view('livewire.bank-component', compact('banks'))->extends('components.layouts.app')->section('content');
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'active', 'bank_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        Bank::create([
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
        ]);
        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Banka başarıyla eklendi.";
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        $this->bank_id = $id;
        $this->code = $bank->code;
        $this->name = $bank->name;
        $this->active = $bank->active;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate([
            'code' => 'required|max:8|unique:banks,code,' . $this->bank_id,
            'name' => 'required|max:128',
            'active' => 'boolean',
        ]);

        $bank = Bank::findOrFail($this->bank_id);
        $bank->update([
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Banka başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Bank::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Banka başarıyla silindi.";
    }
}