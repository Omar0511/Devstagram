<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store(User $user) {
        //
        // dd($user->username);

        // attach = Agregar un registro en la tabla intermedia, registros de muhos a muchos
        $user->followers()->attach(auth()->user()->id);

        return back();
    }

    public function destroy(User $user) {
        //
        // dd($user->username);

        // attach = Agregar un registro en la tabla intermedia, registros de muhos a muchos
        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}
