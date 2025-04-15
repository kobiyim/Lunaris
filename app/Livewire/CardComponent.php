<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Card;

class CardComponent extends Component
{
    use WithPagination;

    public $code, $name, $card_id;
    public $isEditMode = false;
    public $confirmingDelete = false;
    public $deleteId;
    public $successMessage;

    protected $rules = [
        'code' => 'required|max:8',
        'name' => 'required|max:2056',
    ];

    public function render()
    {
        return view('livewire.card-component', [
            'cards' => Card::orderByDesc('id')->paginate(10),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['code', 'name', 'card_id', 'isEditMode']);
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        Card::create([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatchBrowserEvent('modal-close');
        $this->successMessage = "Cari hesap başarıyla eklendi.";
    }

    public function edit($id)
    {
        $card = Card::findOrFail($id);
        $this->card_id = $id;
        $this->code = $card->code;
        $this->name = $card->name;
        $this->isEditMode = true;

        $this->dispatchBrowserEvent('modal-open');
    }

    public function update()
    {
        $this->validate();

        $card = Card::findOrFail($this->card_id);
        $card->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        $this->resetForm();
        $this->dispatchBrowserEvent('modal-close');
        $this->successMessage = "Cari hesap başarıyla güncellendi.";
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Card::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->successMessage = "Cari hesap başarıyla silindi.";
    }
}
