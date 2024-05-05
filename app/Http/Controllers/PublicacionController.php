<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicacionRequest;
use App\Http\Requests\UpdatePublicacionRequest;
use App\Models\Fecha;
use App\Models\Imagen;
use App\Models\Publicacion;
use App\Models\Video;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $res = Publicacion::where('tipo','resena')->orderByDesc('created_at')->first();
            $rec = Publicacion::where('tipo','recomendacion')->orderByDesc('created_at')->first();
            $ent = Publicacion::where('tipo','entrevista')->orderByDesc('created_at')->first();
            $eve = Publicacion::where('tipo','evento')->orderByDesc('created_at')->first();
            return view('publicaciones.index', compact('res','rec','ent','eve'));
    }

    public function listado(String $tipo){
        $publicaciones =  Publicacion::where('tipo',$tipo)->limit(10)->get();
        $media = null;
        switch ($tipo){
            default:
            case 'resena':
                //rescatar imagenes
            break;
            case 'recomendacion':
                //rescatar imagen
            break;
            case 'entrevista':
                //rescatar video
            break;
            case 'evento':
                //rescatar imagen y fecha
            break;
        }
        return view('publicaciones.listado', compact('publicaciones','media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publicaciones.crear.eleccion');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createArguments(String $tipo)
    {
        return view('publicaciones.crear.'.$tipo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicacionRequest $request)
    {
        $pub = new Publicacion($request->input());
        $pub->save();

        switch ($request->tipo){
            case 'evento':
                $fch = new Fecha();
                $fecha = explode('T', $request->fch);
                $fecha = $fecha[0] . ' ' . $fecha[1] . ':00';
                $fch->fecha = $fecha;
                $fch->id_pub = $pub->id;
                $fch->save();
                //no break because 'evento' also needs an image
            case 'recomendacion':
            case 'resena':
                $img = new Imagen();
                $path = $request->img->path();
                $source = file_get_contents($path);
                $base64 = base64_encode($source);
                $blob = 'data:png;base64,'.$base64;
                $img->img = $blob;
                $img->id_pub = $pub->id;
                $img->save();
            break;
            case 'entrevista':
                $vid = new Video();
                /*$path = $request->vid->path();
                $source = file_get_contents($path);
                $base64 = base64_encode($source);
                $blob = 'data:mp4;base64,'.$base64;
                $vid->vid = $blob;*/
                $vid->vid = '0101';
                $vid->id_pub = $pub->id;
                $vid->save();
            break;
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        $view = 'publicaciones.ver.' . $publicacion->tipo;
        $media = null;
        switch ($publicacion->tipo){
            case 'resena':
                $media = Imagen::where('id_pub', $publicacion->id)->first()->img;
            break;
            case 'recomendacion':
                $media = Imagen::where('id_pub', $publicacion->id)->first()->img;
            break;
            case 'entrevista':
                $media = Video::where('id_pub', $publicacion->id)->first()->vid;
            break;
            case 'evento':
                $media[] = Imagen::where('id_pub', $publicacion->id)->first()->img;
                $media[] = Fecha::where('id_pub', $publicacion->id)->first()->fecha;
            break;
        }
        return view($view,compact('publicacion','media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $publicacion)
    {
        $view = 'publicaciones.editar.' . $publicacion->tipo;
        return view($view,compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicacionRequest $request, Publicacion $publicacion)
    {
        $publicacion->update($request->input());

        switch ($request->tipo){
            case 'evento':
                if($request->fch != null){
                    $fch = Fecha::where('id_pub', $publicacion->id)->first();
                    $fecha = explode('T', $request->fch);
                    $fecha = $fecha[0] . ' ' . $fecha[1] . ':00';
                    $fch->update(['_method' => 'PATCH', 'fecha' => $fecha]);
                }
            //no break because 'evento' also needs an image
            case 'recomendacion':
            case 'resena':
                if($request->img != null){
                    $img = Imagen::where('id_pub', $publicacion->id)->first();
                    $path = $request->img->path();
                    $source = file_get_contents($path);
                    $base64 = base64_encode($source);
                    $blob = 'data:png;base64,' . $base64;
                    $img->update(['_method' => 'PATCH', 'img' => $blob]);
                }
                break;
            case 'entrevista':
                $vid = Video::where('id_pub', $publicacion->id)->first()->vid;
                /*$path = $request->vid->path();
                $source = file_get_contents($path);
                $base64 = base64_encode($source);
                $blob = 'data:mp4;base64,'.$base64;
                */
                $blob = '0101';
                $vid->update(['_method' => 'PATCH', 'vid' => $blob]);
                break;
        }

        return redirect(route('publicacion.show',$publicacion->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $publicacion)
    {
        $publicacion->delete();
        return redirect('/');
    }
}
