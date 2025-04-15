<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BankFiche;
use App\Models\BankFicheLine;
use App\Models\BankAccount;
use App\Models\Card;
use Illuminate\Support\Str;

class BankFicheForm extends Component
{
    public $date_;
    public $ficheno;
    public $trcode;
    public $sign;
    public $description;

    public $lines = [];

    public $bankFiche;

    public function mount(BankFiche $bankFiche = null)
    {
        if ($bankFiche && $bankFiche->exists) {
            $this->bankFiche = $bankFiche;
            $this->date_ = $bankFiche->date_;
            $this->ficheno = $bankFiche->ficheno;
            $this->trcode = $bankFiche->trcode;
            $this->sign = $bankFiche->sign;
            $this->description = $bankFiche->description;

            $this->lines = $bankFiche->lines->map(function ($line) {
                return [
                    'bank_id' => $line->bank_id,
                    'card_id' => $line->card_id,
                    'description' => $line->description,
                    'amount' => $line->amount,
                ];
            })->toArray();
        } else {
            // Yeni kayıt için başlangıç
            $this->date_ = now()->format('Y-m-d');
            $this->ficheno = 'BF-' . strtoupper(Str::random(6));
            $this->trcode = 1;
            $this->sign = 1;
            $this->lines[] = $this->emptyLine();
        }
    }

    public function emptyLine()
    {
        return [
            'bank_id' => null,
            'card_id' => null,
            'description' => '',
            'amount' => 0,
        ];
    }

    public function addLine()
    {
        $this->lines[] = $this->emptyLine();
    }

    public function addLineAbove($index)
    {
        array_splice($this->lines, $index, 0, [$this->emptyLine()]);
    }

    public function addLineBelow($index)
    {
        array_splice($this->lines, $index + 1, 0, [$this->emptyLine()]);
    }

    public function removeLine($index)
    {
        unset($this->lines[$index]);
        $this->lines = array_values($this->lines);
    }

    public function save()
    {
        $this->validate([
            'date_' => 'required|date',
            'ficheno' => 'required|string|unique:bank_fiches,ficheno,' . optional($this->bankFiche)->id,
            'trcode' => 'required|integer',
            'sign' => 'required|integer',
            'lines.*.bank_id' => 'required|integer|exists:bank_accounts,id',
            'lines.*.card_id' => 'nullable|integer|exists:cards,id',
            'lines.*.amount' => 'required|numeric|min:0.01',
        ]);

        $data = [
            'date_' => $this->date_,
            'ficheno' => $this->ficheno,
            'trcode' => $this->trcode,
            'sign' => $this->sign,
            'amount' => collect($this->lines)->sum('amount'),
            'description' => $this->description,
        ];

        $fiche = $this->bankFiche
            ? tap($this->bankFiche)->update($data)
            : BankFiche::create($data);

        if ($this->bankFiche) {
            $fiche->lines()->delete(); // eski satırları temizle
        }

        foreach ($this->lines as $i => $line) {
            $fiche->lines()->create([
                'line_number' => $i + 1,
                'bank_id' => $line['bank_id'],
                'card_id' => $line['card_id'],
                'amount' => $line['amount'],
                'description' => $line['description'],
            ]);
        }

        session()->flash('message', 'Banka fişi başarıyla ' . ($this->bankFiche ? 'güncellendi' : 'oluşturuldu') . '.');

        return redirect()->route('bank-fiche.index');
    }

    public function render()
    {
        return view('livewire.bank-fiche-form', [
            'banks' => BankAccount::all(),
            'cards' => Card::all(),
        ]);
    }
}