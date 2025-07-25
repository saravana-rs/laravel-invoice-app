<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Services\InvoiceCalculator;
use App\Events\InvoiceCreated;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice-form');
    }

    public function store(StoreInvoiceRequest $request, InvoiceCalculator $calculator)
    {
        $data = $request->validated();

        // used the Services
        $calculation = $calculator->calculate($data['items'], $data['tax_percentage']);

        $invoice = Invoice::create([
            'client_name' => $data['client_name'],
            'email' => $data['email'],
            'subtotal' => $calculation['subtotal'],
            'tax_amount' => $calculation['tax_amount'],
            'total' => $calculation['total'],
        ]);

        foreach ($data['items'] as $item) {
            $invoice->items()->create([
                'item_description' => $item['item_description'],
                'quantity' => $item['quantity'],
                'price_per_item' => $item['price_per_item'],
                'line_total' => $item['quantity'] * $item['price_per_item'],
            ]);
        }
        
        event(new InvoiceCreated($invoice));

        return redirect()->route('invoices.create')->with('success', 'Invoice created and email queued.');
    }
}
