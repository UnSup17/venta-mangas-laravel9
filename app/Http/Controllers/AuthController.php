<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function form_login() {
        return view('auth.login');
    }
    public function login(Request $request) {
        $data = $request->all();
        $user = User::where('email', $data['email'])->get();
        if ($user->isEmpty()) {
            $request->session()->put('error', 'ERROR: Email no existe');
            return back();
        }
        if (!password_verify($data['password'], $user[0]->password)) {
            $request->session()->put('error', 'ERROR: Contraseña equivocada');
            return back()->onlyInput('email');
        }
        $request->session()->put('user', $user);
        return redirect()->route('home');
    }

    public function form_register() {
        return view('auth.register');
    }
    public function register(Request $request) {
        $data = $request->all();
        $users = User::where('email', $data['email'])->get();
        if (!$users->isEmpty()) {
            $request->session()->put('error', 'ERROR: email ya registrado');
            return back();
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
        $request->session()->put('success', 'usuario creado');
        return back();
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return back();
    }
}
