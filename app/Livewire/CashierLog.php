<?php

namespace App\Livewire;


use App\Models\InvoiceLog;
use App\Models\OngoingInvoice;
use App\Models\Product;
use Livewire\Component;

class CashierLog extends Component
{
    protected $listeners = ['logAdded', 'productQuantityError'];

    public $logs = [];
    public $error;

    public function render()
    {
        return view('livewire.cashier-log');
    }

    public function productQuantityError($message)
    {
        $this->error = $message;
    }

    public function logAdded(string $customer, int $productId, int $qty, int $ongoingInvoiceId)
    {
        $product = Product::find($productId);
        assert(!is_null($product));

        $ongoingInvoice = OngoingInvoice::find($ongoingInvoiceId);
        assert(!is_null($ongoingInvoice));

        $ongoingInvoice->update(['customer' => $customer]);

        $ongoingInvoice->logs()->create([
            'product_id' => $product->id,
            'qty' => $qty,
            'total' => $product->price * $qty
        ]);

        $this->logs = $ongoingInvoice->logs;

        $grandTotal = $this->logs->sum(function (InvoiceLog $log) {
            return $log->total;
        });

        $this->emit('grandTotalChanged', $grandTotal, $ongoingInvoiceId);
    }
}
