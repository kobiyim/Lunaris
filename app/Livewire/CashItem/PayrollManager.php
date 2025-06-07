<?php

namespace App\Livewire\CashItem;

use App\Models\Lunaris\PAyroll;
use Livewire\Component;
use Livewire\WithPagination;

class PayrollManager extends Component
{
    use WithPagination;

    public function render()
    {
        return view('cash-item.payrolls', [
            'payrolls' => Payroll::paginate(10),
        ]);
    }
}
