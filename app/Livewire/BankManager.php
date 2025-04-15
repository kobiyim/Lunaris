<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bank;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;


class BankManager extends Component
{
    use WithPagination;

    public $bankId, $code, $name, $active = true;
    public $modalMode = 'create';

    public function render()
    {
        return view('livewire.bank-manager', [
            'banks' => Bank::paginate(10),
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['code', 'name', 'active', 'bankId']);
        $this->modalMode = $mode;

        if ($mode === 'edit' && $id) {
            $bank = Bank::findOrFail($id);
            $this->bankId = $bank->id;
            $this->code = $bank->code;
            $this->name = $bank->name;
            $this->active = $bank->active;
        }

        $this->dispatch('show-bank-modal');
    }

    public function save()
    {
        $rules = [
            'code' => ['required', 'max:8', Rule::unique('lunaris_banks', 'code')->ignore($this->bankId)],
            'name' => 'required|max:128',
            'active' => 'boolean',
        ];

        $this->validate($rules, [
            'code.unique' => 'Bu kod zaten kullanılıyor.',
            'code.required' => 'Kod alanı zorunludur.',
            'name.required' => 'Banka adı zorunludur.',
        ]);

        if ($this->modalMode === 'create') {
            Bank::create($this->only(['code', 'name', 'active']));
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Banka eklendi.']);
        } else {
            $bank = Bank::findOrFail($this->bankId);
            $bank->update($this->only(['code', 'name', 'active']));
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Banka güncellendi.']);
        }

        $this->dispatch('hide-bank-modal');
        $this->reset(['code', 'name', 'active', 'bankId']);
    }
}