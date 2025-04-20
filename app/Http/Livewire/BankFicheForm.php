<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BankFiche;
use App\Models\BankFicheLine;
use Illuminate\Support\Collection;

class BankFicheForm extends Component
{
    public $date_;
    public $ficheno;
    public $transaction;
    public $sign = '+';
    public $total;
    public $description;

    public $lines = [];

    protected $rules = [
        'date_' => 'required|date',
        'ficheno' => 'required|string|unique:banka_fişleri,ficheno',
        'transaction' => 'required|string',
        'sign' => 'required|in:+,-',
        'total' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'lines.*.bank_account_id' => 'required|integer',
        'lines.*.card_id' => 'nullable|integer',
        'lines.*.description' => 'nullable|string',
        'lines.*.amount' => 'required|numeric|min:0',
    ];

    public function mount()
    {
        $this->addLine(); // sayfa açıldığında bir satır gözüksün
    }

    public function addLine()
    {
        $this->lines[] = [
            'bank_account_id' => '',
            'card_id' => '',
            'description' => '',
            'amount' => '',
        ];
    }

    public function removeLine($index)
    {
        unset($this->lines[$index]);
        $this->lines = array_values($this->lines); // indexleri düzelt
    }

    public function save()
    {
        $validated = $this->validate();

        $fiche = BankFiche::create([
            'date_' => $this->date_,
            'ficheno' => $this->ficheno,
            'transaction' => $this->transaction,
            'sign' => $this->sign,
            'total' => $this->total,
            'description' => $this->description,
        ]);

        foreach ($this->lines as $line) {
            $fiche->lines()->create($line);
        }

        session()->flash('success', 'Banka fişi ve satırları başarıyla oluşturuldu.');
        $this->reset(); // her şeyi temizle
        $this->addLine(); // yeni boş satır
    }

    public function render()
    {
        return view('livewire.bank-fiche-form');
    }
}
