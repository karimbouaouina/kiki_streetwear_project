<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Order;
use Validator;

class BillController extends Controller
{
    public function index() {
        $bills = Bill::with('order')->get();
        return view('bills.index', compact('bills'));
    }

    public function create() {
        $orders = Order::all();
        return view('bills.create', compact('orders'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'billingDate' => 'required|date',
            'taxRegistrationNumber' => 'required|max:255',
            'orderID' => 'required|exists:order,orderID'
        ]);

        $bill = Bill::create($validatedData);
        return redirect()->route('bills.index')->with('success', 'Bill created successfully.');
    }

    public function show(Bill $bill) {
        return view('bills.show', compact('bill'));
    }

    public function edit(Bill $bill) {
        $orders = Order::all();
        return view('bills.edit', compact('bill', 'orders'));
    }

    public function update(Request $request, Bill $bill) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'billingDate' => 'required|date',
            'taxRegistrationNumber' => 'required|max:255',
            'orderID' => 'required|exists:order,orderID'
        ]);

        $bill->update($validatedData);
        return redirect()->route('bills.index')->with('success', 'Bill updated successfully.');
    }

    public function destroy(Bill $bill) {
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }
}
