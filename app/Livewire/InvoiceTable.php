<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;


class InvoiceTable extends Component
{
    public $invoices;

    protected $query;

    protected $listeners = ['onCashierChange', 'onDateChange'];

    public function render()
    {
        return view('livewire.invoice-table');
    }

    public function onCashierChange(string $cashierId)
    {
        if ($cashierId === '*') {
            $this->invoices = Invoice::all();
            return;
        }

        $this->invoices = Invoice::where('user_id', (int) $cashierId)->get();
    }

    public function onDateChange(string $date)
    {
        $this->invoices = Invoice::whereDate('created_at', '=', $date)->get();
    }
}
