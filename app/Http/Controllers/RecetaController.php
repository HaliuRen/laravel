<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    //autenticar usuarios y poder accedera los demas metodos
    public function __construct()
    {
        //autenticacion
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::user()->recetas->dd();
        //auth()->user()->recetas->dd();

        $recetas = auth()->user()->recetas;
        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //consultando las categorias por id y nombre 
        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();

        //Obteniendo las categorias (sin modelo)
        //conusltando las categorias por id y nombre y asignandolo a una variable
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        //obteniendo las categorias con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias); //pasando a la vista la consuta
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd( $request['imagen']->store('upload-recetas','public') );

        //validaciones formulario crear recetas
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);

        //obteniendo la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas','public');

        // Resize de la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000,550);
        $img->save();// guardando en el disco duro del servidor

        
        // //almacenando en la bd (sin modelo)
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'preparacion' => $data['preparacion'],
        //     'ingredientes' => $data['ingredientes'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id, //funcionn que retorna el usuario autenticado
        //     'categoria_id' => $data['categoria'],
        // ]);

        // almacenar en la bd con modelo
        auth()->user()->recetas()->create([
            'titulo'=> $data['titulo'],
            'preparacion'=> $data['preparacion'],
            'ingredientes'=> $data['ingredientes'],
            'imagen'=> $ruta_imagen,
            'categoria_id'=>$data['categoria']
        ]);

        // Redireccionar
        return redirect()->action('RecetaController@index');

        //dd( $request->all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Algunos metodos para obtener una receta
        //$receta = Receta::find($receta);

        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
