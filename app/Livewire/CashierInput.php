<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request as HttpRequest;
use Livewire\Component;

class CashierInput extends Component
{
    public $selectProductId;
    public $ongoingInvoiceId = 0;
    public $products = [];
    public $product = null;
    public $customer;
    public $price = 0;
    public $priceHtml = '';
    public $totalPrice = 0;
    public $totalPriceHtml = '';
    public $qty = 1;

    protected $rules = [
        'selectProductId' => 'required',
        'customer' => 'required'
    ];

    public function mount()
    {
        $this->products = Product::limit(10)->get();
    }

    public function render()
    {
        return view('livewire.cashier-input');
    }

    public function onProductChange()
    {
        $this->product = Product::find($this->selectProductId);
        assert(!is_null($this->product));

        $this->price = $this->product->price;
        $this->priceHtml = $this->price;

        $this->onQtyChange();
    }

    public function onQtyChange()
    {
        $this->totalPrice = $this->price * (int)$this->qty;
        $this->totalPriceHtml = $this->totalPrice;

    }

    public function onAddClick()
    {
        $this->validate();

        $product = Product::find($this->selectProductId);

        if ($product) {
            if ($product->quantity >= $this->qty) {
                $product->quantity -= $this->qty;
                $product->save();

                $this->emit('logAdded', $this->customer, $product->id, $this->qty, $this->ongoingInvoiceId);
            } else {
                $this->addError('quantity', 'Barang Tidak Cukup');
            }
        }
    }
}
