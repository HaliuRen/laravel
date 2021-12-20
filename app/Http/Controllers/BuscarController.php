<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $buscar = [
        //     'nombre' => 'Pizza',
        //     'descripcion' => 'Pizza hawaina'
        // ];


        return view('buscar');
        //return $buscar;
    }
}
