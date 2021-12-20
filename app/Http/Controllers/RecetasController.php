<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $recetas = ['Receta Pizzza', 'Receta Hamburguesa', 'Receta Tacos'];
        $categorias = ['Comida Mexicana', 'Comida Argentina', 'Postres'];

        //pasando los valores a la vista
        // return view('recetas.index')->with('recetas', $recetas);//sintaxis 1
        //return view('recetas.index', compact ('recetas'));//sintaxis 2

        //Pasando multiples consultas
        return view('recetas.index')
            ->with('recetas', $recetas)
            
            ->with('categorias', $categorias);
        
        // return view('recetas.index', compact ('recetas','categorias'));//sintaxis 2
    }
}
