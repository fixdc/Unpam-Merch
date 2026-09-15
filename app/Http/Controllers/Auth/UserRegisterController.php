<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function create(){
        return view("register");
    }

    public function store(Request $request){

        $validated = $request->validate([
            "email"=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            "name"=> ['required', 'string', 'max:255'],
            "no_telp"=> ['required', 'string', 'max:15'],
            "password"=> ['required', 'string', 'min:8', ],
        ]);

        $user = User::create([
            'email'    => $validated['email'],
            'name'     => $validated['name'],
            'no_telp'    => $validated['no_telp'],
            'password' => Hash::make($validated['password']),
        ]);


        Auth::login($user);

        return redirect()->intended('/home');
    }
}
