<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
    return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ] );
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            
            switch ($user->role->name) {
                case 'superadmin':
                    return redirect()->route('dashboard');
                case 'admin':
                    return redirect()->route('dashboard');
                case 'user':
                    return redirect()->route('dashboard');
                default:
                    return redirect()->route('dashboard'); // Default fallback route
            }
        }

        $errorField = User::where('email', $credentials['email'])->exists() ? 'password' : 'email';

        return back()->withErrors([
            $errorField => $errorField === 'password' ? 'The password is incorrect.' : 'The provided credentials do not match our records.',
    
        ])->onlyInput('email');
        
    }
       

}


