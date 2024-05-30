<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicacionRequest;
use App\Http\Requests\UpdatePublicacionRequest;
use App\Models\Comentario;
use App\Models\Fecha;
use App\Models\Guarda;
use App\Models\Imagen;
use App\Models\Publicacion;
use App\Models\Video;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $res = Publicacion::where('tipo','resena')->orderByDesc('created_at')->first();
            $res['media'] = Imagen::where('id_pub', $res->id)->first()->img;
            $rec = Publicacion::where('tipo','recomendacion')->orderByDesc('created_at')->first();
            $rec['media'] = Imagen::where('id_pub', $rec->id)->first()->img;
            $ent = Publicacion::where('tipo','entrevista')->orderByDesc('created_at')->first();
            $ent['media'] = Imagen::where('id_pub', $ent->id)->first()->img;
            $eve = Publicacion::where('tipo','evento')->orderByDesc('created_at')->first();
            $eve['media'] = Imagen::where('id_pub', $eve->id)->first()->img;
            return view('publicaciones.index', compact('res','rec','ent','eve'));
    }

    public function listado(String $tipo){
        $publicaciones =  Publicacion::where('tipo',$tipo)->limit(10)->orderByDesc('created_at')->get();
        foreach ($publicaciones as &$pub){
            $pub['media'] = Imagen::where('id_pub', $pub->id)->first()->img;
            $pub->texto = substr($pub->texto,0,100) . '...';
        }
        return view('publicaciones.listado', compact('publicaciones','tipo'));
    }

    public function listadoFiltrado(FormRequest $request){
        $titulo = htmlspecialchars($request->titulo);
        $publicaciones =  DB::select('select * from publicaciones where tipo = \''.$request->tipo.'\' AND titulo LIKE  \'%'. $titulo .'%\' ORDER BY created_at ' . $request->orden);
        //dd($publicaciones);
        //dd($publicaciones[0]);
        foreach ($publicaciones as &$pub){
            //dd($pub);
            $pub->media = Imagen::where('id_pub', $pub->id)->first()->img;
            $pub->texto = substr($pub->texto,0,100) . '...';
        }
        $tipo = $request->tipo;
        return view('publicaciones.listado', compact('publicaciones', 'tipo'));
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
                $path = $request->vid->path();
                $source = file_get_contents($path);
                $base64 = base64_encode($source);
                $blob = 'data:mp4;base64,'.$base64;
                $vid->vid = $blob;
                $vid->id_pub = $pub->id;
                $vid->save();

                $img = new Imagen();
                $path = $request->img->path();
                $source = file_get_contents($path);
                $base64 = base64_encode($source);
                $blob = 'data:png;base64,'.$base64;
                $img->img = $blob;
                $img->id_pub = $pub->id;
                $img->save();
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
        $comentarios = Comentario::where('id_pub', $publicacion->id)->orderByDesc('created_at')->get();

        return view($view,compact('publicacion','media','comentarios'));
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
                if($request->vid != null) {
                    $vid = Video::where('id_pub', $publicacion->id)->first();
                    $path = $request->vid->path();
                    $source = file_get_contents($path);
                    $base64 = base64_encode($source);
                    $blob = 'data:mp4;base64,' . $base64;
                    $vid->update(['_method' => 'PATCH', 'vid' => $blob]);
                }
                if($request->img != null){
                    $img = Imagen::where('id_pub', $publicacion->id)->first();
                    $path = $request->img->path();
                    $source = file_get_contents($path);
                    $base64 = base64_encode($source);
                    $blob = 'data:png;base64,' . $base64;
                    $img->update(['_method' => 'PATCH', 'img' => $blob]);
                }
            break;
        }

        return redirect(route('publicacion.show',$publicacion->id));
    }

    public function guardarPublicacion(int $id_pub)
    {
        if($this->estaGuardada($id_pub,auth()->user()->id)) {
            Guarda::where('id_pub', $id_pub)->where('id_us',auth()->user()->id)->delete();
        }else{
            $guardado = new Guarda(['id_pub' => $id_pub, 'id_us' => auth()->user()->id]);
            $guardado->save();
        }
        return redirect(route('publicacion.show',$id_pub));
    }

    public static function estaGuardada(int $id_pub, int $id_us)
    {
        return Guarda::where('id_pub', $id_pub)->where('id_us',$id_us)->first() != null;
    }

    public function showGuardados(int $id_us)
    {
        $publicaciones =  DB::select('select publicaciones.* from publicaciones, guarda where id_us = '.$id_us.' and id = id_pub ORDER BY guarda.created_at DESC');
        foreach ($publicaciones as &$pub){
            $pub->media = Imagen::where('id_pub', $pub->id)->first()->img;
            $pub->texto = substr($pub->texto,0,100) . '...';
        }
        return view('publicaciones.guardados', compact('publicaciones'));
    }

    public function showCalendario(int $id_us){
        $eventos = [];
        $publicaciones = DB::select('select   publicaciones.titulo, fecha.fecha from publicaciones, guarda, fecha where id_us = '.$id_us.' and id = guarda.id_pub and id = fecha.id_pub and tipo = \'evento\' ORDER BY guarda.created_at DESC');
        foreach($publicaciones as $pub){
            $exp = explode(' ',$pub->fecha);
            $fecha = $exp[0] . 'T' . $exp[1];
            //$titulo = "<a href='{{route(\"publicacion.show\",".$pub->id.")}}'>" . $pub->titulo . "</a>";
            //dd($titulo);
            $eventos[] = [
                'title' => $pub->titulo,
                'start' => $fecha,
            ];
        }
        return view('usuarios.calendario', compact('eventos'));
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
