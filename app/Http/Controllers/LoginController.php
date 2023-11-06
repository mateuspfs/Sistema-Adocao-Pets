<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $credenciais['email'])->first();
    
        if (!$user || !Hash::check($credenciais['password'], $user->senha)) {
            return redirect()->route('admin.login')->with('erro', 'Usuário ou senha Inválida');
        } else {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('animals.index');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home')->with('success', 'Deslogado com sucesso!');
    }
}
