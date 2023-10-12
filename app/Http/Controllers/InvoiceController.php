<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:invoice-list',   ['only' => ['index']]);
        $this->middleware('permission:invoice-approvedList', ['only' => ['approvedList']]);
        $this->middleware('permission:invoice-pendingList',   ['only' => ['pendingList']]);
        $this->middleware('permission:invoice-approvedChengStatus', ['only' => ['approvedChengStatus']]);
        $this->middleware('permission:invoice-refusal', ['only' => ['refusal']]);
    }


    public function index()
    {
        $invoises =  Invoice::all();
        return view('dashbord.invoices.index', compact('invoises'));
    }


    public function show(Invoice $invoice)
    {
        return view('dashbord.invoices.invoice', compact('invoice'));
    }


    public function approvedChengStatus($id)
    {
        $invoises = Invoice::findOrFail($id)->update(['status' => 'approved']);
        return redirect()->back()
            ->with('success', __('master.messages_success', compact('invoises')));

    }

    public function refusal($id)
    {
        $invoises = Invoice::findOrFail($id)->update(['status' => 'refusal']);
        return redirect()->back()
            ->with('success', __('master.messages_success', compact('invoises')));

    }


    public function pendingList()
    {
        $invoises = Invoice::where('status', 'pending')->get();
        return view('dashbord.invoices.index', compact('invoises'));

    }

    public function approvedList()
    {
        $invoises = Invoice::where('status', 'approved')->get();
        return view('dashbord.invoices.index', compact('invoises'));

    }

    public function refusalList()
    {
        $invoises = Invoice::where('status', 'refusal')->get();
        return view('dashbord.invoices.index', compact('invoises'));

    }

}
