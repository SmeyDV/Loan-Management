<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        // Example values; we’ll link them to Blade later
        $totalLoanAmount = Loan::sum('loan_amount');
        $activeLoans = Loan::where('status', 'active')->count();
        $pendingLoans = Loan::where('status', 'pending')->count();
        $overdueLoans = Loan::where('status', 'overdue')->count();
        $recentLoans = \App\Models\Loan::latest()->take(5)->get();


        return view('dashboard', compact(
            'totalLoanAmount',
            'activeLoans',
            'pendingLoans',
            'overdueLoans',
            'recentLoans'
        ));
    }
}
// This controller fetches data from the Loan model and passes it to the dashboard view.