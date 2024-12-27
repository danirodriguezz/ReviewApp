<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validamos el formulario
        $validate = $request->validate([
            "email" => "required|email|max:60",
            "password" => "required|min:7|max:20"
        ]);

        // Obtener credenciales
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); 

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $remember)) {
            // Redirigir al usuario a la página de inicio
            return redirect()->route('home.index');
        }

        // Si falló, redirigir con error
        return back()->with('mensaje', 'Las credenciales no coinciden con nuestros registros.');
    }
}
