<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        

        //validate
       $credentials = request()->only('email', 'password');

    // Only allow the specific admin email
    if ($credentials['email'] !== 'iamstupid@gmail.cock') {
        return back()->withErrors(['email' => 'Access denied.']);
    }

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard');
    }      
        
    }

      public function destroy(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');

    }
}
