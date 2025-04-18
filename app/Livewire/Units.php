<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;

class Units extends Component
{
    public $unitSetId;
    public $units = [];
    public $editRowId = null;

    // Yeni ekleme için geçici alanlar
    public $newCode = '';
    public $newName = '';

    public function mount($unitSetId)
    {
        $this->unitSetId = $unitSetId;
        $this->loadUnits();
    }

    public function loadUnits()
    {
        $this->units = Unit::where('unit_set_id', $this->unitSetId)
            ->orderBy('line_number') // 👈 sıralama eklendi
            ->get()
            ->map(fn ($unit) => $unit->toArray())
            ->toArray();
    }

    public function edit($id)
    {
        $this->editRowId = $id;
    }

    public function save($id)
    {
        $data = collect($this->units)->firstWhere('id', $id);

        $validated = validator($data, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ])->validate();

        Unit::find($id)->update($validated);

        $this->editRowId = null;
        $this->loadUnits();
        session()->flash('success', 'Birim güncellendi.');
    }

    public function delete($id)
    {
        Unit::find($id)?->delete();
        $this->loadUnits();
        session()->flash('success', 'Birim silindi.');
    }

    public function addNew()
    {
        $validated = $this->validate([
            'newCode' => 'required|string|max:255',
            'newName' => 'required|string|max:255',
        ]);

        $maxLineNumber = Unit::where('unit_set_id', $this->unitSetId)->max('line_number') ?? 0;

        Unit::create([
            'unit_set_id' => $this->unitSetId,
            'code' => $this->newCode,
            'name' => $this->newName,
            'line_number' => $maxLineNumber + 1, // 👈 sıraya göre ekle
        ]);

        // Alanları temizle
        $this->newCode = '';
        $this->newName = '';

        $this->loadUnits();
        session()->flash('success', 'Yeni birim eklendi.');
    }

    public function render()
    {
        return view('livewire.units');
    }
}
