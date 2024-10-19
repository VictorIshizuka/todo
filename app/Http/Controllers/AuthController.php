<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $r)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }
    public function index_action(Request $r)
    {
        $credentials = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        // return view('login');
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput();
    }
    public function register(Request $r)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('register');
    }
    public function register_action(Request $r)
    {
        // dd($r);
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $r->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        // return redirect(route('login'));
        return redirect(route('login'))->with('success', 'Cadastro realizado com sucesso. Faça login.');
    }
    public function logout_action(Request $r)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
