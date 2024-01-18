<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OngoingInvoice;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;



class CashierController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $ongoingInvoiceId = OngoingInvoice::create([
            'user_id' => Auth::user()->id
        ])->id;

        return view('cashier', compact('products', 'ongoingInvoiceId'));
    }
}
