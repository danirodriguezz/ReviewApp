<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Modificamos el username
        $request->request->add(['username' => Str::slug($request->username)]);

        $validated = $request->validate([
            "name" => "required|max:30|alpha:ascii",
            "surname" => "required|max:30",
            "username" => "required|unique:users,user_name|min:3|max:20",
            "email" => "required|unique:users|email|max:60",
            "password" => "required|confirmed|min:8"
        ]);


        // Crear el registro de usuario
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'user_name' => $request->username,
            'password' => $request->password
        ]);

        // Autenticar al usuario
        Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        return redirect()->route('home.index', [
            'user' => Auth::user()->username
        ]);


    }
}
