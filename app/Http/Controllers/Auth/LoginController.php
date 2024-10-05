<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Sėkmingai prisijungus, nukreipti į namų puslapį
            return redirect()->route('home')->with('success', 'Prisijungimas sėkmingas!');
        }

        return redirect()->back()->withErrors(['email' => 'Netinkami prisijungimo duomenys.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sėkmingai atsijungėte.');
    }
}
