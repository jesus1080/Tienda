<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $user = User::find(auth()->user()->id);

        return view('perfil', compact('user'));
    }
    
    public function update(Request $request)
    {
        // Procesar la solicitud de actualización de perfil
        // ...

        return redirect()->route('perfil.update')->with('message', 'Perfil actualizado correctamente.');
    }
}
