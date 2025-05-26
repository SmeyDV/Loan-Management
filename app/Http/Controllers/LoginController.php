<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.admin-login'); // Make sure you create this Blade file
    }

    public function adminLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'admin_name' => 'required|string',
            'admin_password' => 'required|string',
        ]);

        // Try to log in with the 'admin' guard
        $credentials = [
            'admin_name' => $request->admin_name,
            'admin_password' => $request->admin_password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['error' => 'Invalid admin credentials']);
    }
}
