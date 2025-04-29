<?php

namespace App\Http\Livewire\Invoice\Sales;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class Create extends Component
{
    public $card_id, $invoice_no, $date, $description, $type, $sign, $total;
    
    public $details = []; // Satır detayları

    public function mount()
    {
        $this->resetInputFields();
    }

    public function render()
    {
        return view('livewire.invoice.sales.create');
    }

    private function resetInputFields()
    {
        $this->card_id = '';
        $this->invoice_no = '';
        $this->date = now();
        $this->description = '';
        $this->type = '';
        $this->sign = '';
        $this->total = 0;
        $this->details = [
            [
                'stock_id' => '', 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0],
        ];
    }

    public function addDetail()
    {
        $this->details[] = ['stock_id' => '', 'unit_id' => '', 'quantity' => 1, 'description' => '', 'price' => 0, 'total' => 0];
    }

    public function removeDetail($index)
    {
        unset($this->details[$index]);
    }

    public function updatedDetails()
    {
        foreach ($this->details as &$detail) {
            $detail['total'] = (float)$detail['quantity'] * (float)$detail['price'];
        }

        $this->total = array_sum(array_column($this->details, 'total'));
    }

    public function store()
    {
        $validatedInvoice = $this->validate([
            'card_id' => 'required',
            'invoice_no' => 'required|unique:invoices,invoice_no,' . $this->invoiceId,
            'date' => 'required|date',
            'type' => 'required',
            'sign' => 'required',
            'total' => 'required|numeric',
        ]);

        $validatedDetails = $this->validate([
            'details.*.stock_id' => 'required',
            'details.*.unit_id' => 'required',
            'details.*.quantity' => 'required|numeric|min:1',
            'details.*.price' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validatedInvoice) {
            $invoice = Invoice::updateOrCreate(
                ['id' => $this->invoiceId],
                $validatedInvoice
            );

            // Yeni detayları kaydet
            foreach ($this->details as $detail) {
                $invoice->details()->create($detail);
            }
        });

        session()->flash('message', $this->invoiceId ? 'Fatura ve detaylar güncellendi.' : 'Fatura ve detaylar eklendi.');
        $this->resetInputFields();

        return redirect()->url('invoice/sales');
    }
}
