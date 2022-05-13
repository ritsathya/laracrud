<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validateion
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Redirect back to login page if login fail
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details.');
        }
        
        // Otherwise, go to category page
        return redirect()->route('category');

    }
}
