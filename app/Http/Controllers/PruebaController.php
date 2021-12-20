<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function hola()
    {
        return view('nosotros');
    }
}
