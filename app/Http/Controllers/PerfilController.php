<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Image;

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
        $user = User::find(auth()->user()->id);
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed',
            'photo' => 'nullable|image'
        ]);

        $user->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save(public_path('\uploads\photos\ '.$filename));
            $user->photo = $filename;
            $user->save();
        }

        return redirect()->route('home')->with('message', 'Perfil actualizado correctamente.');

    }
}
