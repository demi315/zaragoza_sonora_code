<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(StoreComentarioRequest $request)
    {
        $pub = new Comentario($request->input());
        $pub->save();

        return redirect(route('publicacion.show',$request->id_pub));
    }
}
