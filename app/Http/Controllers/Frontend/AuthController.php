<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect('profile_1');
            } else {
                return back()->withInput()->withErrors(['Contraseña Incorrecta']);
            }
        }else{
            return back()->withInput()->withErrors(['Usuario no registrado']);
        }
    }
}
