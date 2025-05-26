<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ensurer;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $ensurers = Ensurer::all();
        return view('loans.create', compact('customers', 'ensurers'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_khmer_name' => 'required|string',
            'loan_amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'starting_date' => 'required|date',
            'loan_term' => 'required|integer|min:1',
        ]);

        // Create customer first
        $customer = \App\Models\Customer::create([
            'name' => $request->customer_name,
            'khmer_name' => $request->customer_khmer_name,
            'phone' => 'N/A',
        ]);

        // Create loan and save currency from form
        \App\Models\Loan::create([
            'customer_id' => $customer->id,
            'loan_amount' => $request->loan_amount,
            'interest_rate' => $request->interest_rate,
            'starting_date' => $request->starting_date,
            'payment_frequency' => 30,
            'currency' => $request->currency, // Get currency from form
            'status' => $request->status, // Get status from form
        ]);

        return redirect()->route('dashboard')->with('success', 'Loan created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loan = \App\Models\Loan::with('customer')->findOrFail($id);
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $loan = \App\Models\Loan::with('customer')->findOrFail($id);
        return view('loans.edit', compact('loan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loan_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'starting_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $loan = \App\Models\Loan::findOrFail($id);
        $loan->update($request->only([
            'loan_amount',
            'interest_rate',
            'starting_date',
            'status',
        ]));

        return redirect()->route('dashboard')->with('success', 'Loan updated successfully.');
    }


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
