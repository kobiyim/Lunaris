<?php

namespace App\Livewire\Invoice\Sales;

use Livewire\Component;
use App\Models\Lunaris\Card;
use App\Models\Lunaris\CardActivity;
use App\Models\Lunaris\Item;
use App\Models\Lunaris\Invoice;
use App\Models\Lunaris\InvoiceDetail;

class Create extends Component
{
    public $card_id, $invoice_no, $date_, $description, $type, $total, $stocks;
    
    public $details = []; // Satır detayları

    public function mount()
    {
        $this->stocks = Item::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        $this->resetInputFields();
    }

    public function render()
    {
        $data['cards'] = Card::where('active', 1)->orderBy('name')->get()->pluck('name', 'id');

        return view('invoice.sales.create', $data);
    }

    private function resetInputFields()
    {
        $this->card_id = '';
        $this->invoice_no = '';
        $this->date = now();
        $this->description = '';
        $this->type = '';
        $this->total = 0;
        $this->details = [
            [
                'stock_id' => $this->stocks->keys()->first(), 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0,
            ],
        ];
    }

    public function addDetail()
    {
        $this->details[] = ['stock_id' => $this->stocks->keys()->first(), 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0];
    }

    public function removeDetail($index)
    {
        unset($this->details[$index]);
    }

    public function store()
    {
        $validatedInvoice = $this->validate([
            'card_id' => 'required',
            'invoice_no' => 'required|unique:lunaris_invoices,invoice_no',
            'date_' => 'required|date',
            'type' => 'required',
            'total' => 'required|numeric',
        ]);

        $validatedDetails = $this->validate([
            'details.*.stock_id' => 'required',
            'details.*.unit_id' => 'required',
            'details.*.quantity' => 'required|numeric|min:1',
            'details.*.price' => 'required|numeric|min:0',
        ]);

        foreach ($this->details as &$detail) {
            $detail['total'] = (float)$detail['quantity'] * (float)$detail['price'];
        }

        $this->total = array_sum(array_column($this->details, 'total'));

        $invoice = Invoice::create([
            'card_id' => $this->card_id,
            'invoice_no' => $this->invoice_no,
            'date_' => $this->date_,
            'description' => $this->description,
            'type' => $this->type,
            'sign' => signOfSalesInvoice($this->type),
            'total' => $this->total
        ]);

        CardActivity::create([
            'card_id' => $this->card_id,
            'type' => 1,
            'subject_id' => $invoice->id,
            'sign' => signOfSalesInvoice($this->type),
            'date_' => $this->date_,
            'total' => $this->total
        ]);

        // Yeni detayları kaydet
        foreach ($this->details as $detail) {
            $invoice->details()->create($detail);
        }

        session()->flash('message', 'Fatura ve detaylar eklendi.');

        $this->resetInputFields();
    }
}
