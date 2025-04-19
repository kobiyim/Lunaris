<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Unit;
use App\Models\UnitSet;

class UnitComponent extends Component
{
    use WithPagination;

    public $unit_set_id, $code, $name, $line_number, $unit_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'unit_set_id' => 'required|exists:unit_sets,id',
        'code' => 'required|max:8',
        'name' => 'required|max:512',
        'line_number' => 'required|max:512',
    ];

    public function render()
    {
        return view('livewire.unit-component', [
            'units' => Unit::with('unitSet')->orderByDesc('id')->paginate(10),
            'unitSets' => UnitSet::all(),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['unit_set_id', 'code', 'name', 'line_number', 'unit_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Unit::create([
            'unit_set_id' => $this->unit_set_id,
            'code' => $this->code,
            'name' => $this->name,
            'line_number' => $this->line_number,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Birim başarıyla eklendi.";
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $this->unit_id = $id;
        $this->unit_set_id = $unit->unit_set_id;
        $this->code = $unit->code;
        $this->name = $unit->name;
        $this->line_number = $unit->line_number;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $unit = Unit::findOrFail($this->unit_id);
        $unit->update([
            'unit_set_id' => $this->unit_set_id,
            'code' => $this->code,
            'name' => $this->name,
            'line_number' => $this->line_number,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Birim başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Unit::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Birim başarıyla silindi.";
    }
}
