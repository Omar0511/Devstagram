<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LogoutController extends Controller
{
    use ValidatesRequests;
    //
    public function store() {
        // dd('Cerrando sesión');

        auth()->logout();

        return redirect()->route('login');
    }
}