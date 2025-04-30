<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lunaris\Item;
use App\Models\Lunaris\UnitSet;

class ItemManager extends Component
{
    use WithPagination;

    public $code, $name, $unit_set_id, $item_id, $unitSets, $search;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:512',
        'unit_set_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->unitSets = UnitSet::all();
    }

    public function render()
    {
        return view('item-component', [
            'items' => Item::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('code', 'LIKE', '%' . $this->search . '%')->orderByDesc('id')->paginate(10),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'unit_set_id', 'item_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Item::create([
            'code' => $this->code,
            'name' => $this->name,
            'unit_set_id' => $this->unit_set_id,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Stok başarıyla eklendi.";
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $this->item_id = $id;
        $this->code = $item->code;
        $this->name = $item->name;
        $this->unit_set_id = $item->unit_set_id;
        $this->isEditMode = true;

        $this->dispatch('modal-open');
    }

    public function update()
    {
        $this->validate();

        $item = Item::findOrFail($this->item_id);
        $item->update([
            'code' => $this->code,
            'name' => $this->name,
            'unit_set_id' => $this->unit_set_id,
        ]);

        $this->resetForm();
        $this->dispatch('modal-close');
        $this->successMessage = "Stok başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Item::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Stok başarıyla silindi.";
    }
}
