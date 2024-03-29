<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice) {
        return view('invoices.show', compact('invoice'));
    }
}
