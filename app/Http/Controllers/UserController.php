<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('auth.users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully');
    }

    public function updateRol($id)
    {
        $user = User::find($id);
        $user->role = 'cliente';
        $user->save();

        return redirect('/users')->with('success', 'User deleted successfully');
    }

    public function userSupervisor($id)
    {
        $count = User::where('role', '=','supervisor')->count();


        if($count < 3){
            $user = User::find($id);
            $user->role = 'supervisor';
            $user->save();
            return redirect('/users')->with('success', 'User update successfully');
        }
        
        return redirect('/users')->with('success', 'Ya no puede crear mas supervisores');

        
    }
}
