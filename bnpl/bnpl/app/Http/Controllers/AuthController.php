<?php

namespace App\Http\Controllers;


use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('registerForm');
    }

    public function loginForm()
    {
        return view('loginForm');
    }

    public function register(Request $request)
    {
        $validated = $this->validate($request, [
            "firstName" => "required|string",
            "lastName" => "required|string",
            "username" => "required|string",
            "password" => "required|string",
         
            "email" => "required|string"
        ]);


        User::create([
            "first_name" => $validated['firstName'],
            "last_name" => $validated['lastName'],
            "username" => $validated['username'],
            "password" => Hash::make($validated['password']),
      
            "email" => $validated['email']
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return response("You're credentials are incorrect!<br>");
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }


}
