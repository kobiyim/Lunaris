<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UnitSet;

class UnitSetComponent extends Component
{
    use WithPagination;

    public $code, $name, $unit_set_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:512',
    ];

    public function render()
    {
        return view('livewire.unit-set-component', [
            'unitSets' => UnitSet::orderByDesc('id')->paginate(10),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'unit_set_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        UnitSet::create([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Birim seti başarıyla eklendi.";
    }

    public function edit($id)
    {
        $unitSet = UnitSet::findOrFail($id);
        $this->unit_set_id = $id;
        $this->code = $unitSet->code;
        $this->name = $unitSet->name;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $unitSet = UnitSet::findOrFail($this->unit_set_id);
        $unitSet->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Birim seti başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        UnitSet::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Birim seti başarıyla silindi.";
    }
}
