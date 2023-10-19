<?php

namespace App\Http\Controllers;

use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    public function index()
    {
        $purchaseInvoices = PurchaseInvoice::with('supplier')->get();
        // Assuming you have a relationship named 'supplier' in your PurchaseInvoice model
        return view('TransactionModule.PurchaseInvoice.index', compact('purchaseInvoices'));
    }

    public function create()
    {
        return view('TransactionModule.PurchaseInvoice.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        // Show the details of a specific purchase invoice
    }

    public function edit($id)
    {
        // Show the form to edit a specific purchase invoice
    }

    public function update(Request $request, $id)
    {
        // Update a specific purchase invoice in the database
    }

    public function destroy($id)
    {
        // Delete a specific purchase invoice from the database
    }

}
