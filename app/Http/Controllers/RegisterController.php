<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request) {
        //dd($request);
        dd($request->get('username'));

        //validaciones
    }
}
