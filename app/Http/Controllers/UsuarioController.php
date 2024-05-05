<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function index(){
        $usuario = auth()->user();
        return view('usuarios.profile', compact('usuario'));
    }

}
