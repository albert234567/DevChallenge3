<?php

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // Redirigeix a la pàgina que vols, en aquest cas 'llistes.index'
        return redirect()->route('llistes.index');
    }
}
