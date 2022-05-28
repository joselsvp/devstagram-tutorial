<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request) {
        //dd($request);
        //dd($request->get('username'));

        //Modificar el request

        $request->request->add(['username' => Str::slug($request->username)]);

        //validaciones
        $this->validate($request, [
           'name' => 'required|min:5',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
           'name' => $request->name,
           'username' => $request->username,
           'email' => $request->email,
           'password' => Hash::make($request->password)
        ]);

        //Autenticar a un usuario
        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/

        //Otra forma
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
