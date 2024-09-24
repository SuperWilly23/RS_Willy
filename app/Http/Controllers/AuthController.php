<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'require|email',
        //     'password' => 'required',
        // ]);
        
        $user = User::where('email',$request->email)->first();
        $password = $request->password == $user->password;
        if ($user&&$password) {
            return redirect('welcome');
        } 
        //dd('salah');
        //dd($request->email,$request->password);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}


