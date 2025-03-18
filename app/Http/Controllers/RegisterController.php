<?php

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected function registered(Request $request, $user)
    {
        // Redirigeix a la pàgina 'llistes.index' després de registrar-se
        return redirect()->route('llistes.index');
    }
}
