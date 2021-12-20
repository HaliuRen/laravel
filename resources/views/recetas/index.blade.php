@extends('layouts.app')





@section('botones')

   <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2">Crear Receta</a>   

@endsection

@section('content')
    {{-- @foreach ( $recetas as $receta )
        <li> {{ $receta }} </li>
    @endforeach

    <h1>Categorias</h1>

    @foreach ( $categorias as $categoria )
        <li> {{ $categoria }} </li>
    @endforeach --}}

    <h2 class="text-center mb-5"> Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <table class="table">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scole="col">Titulo</th>
                        <th scole="col">Categoria</th>
                        <th scole="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pizza</td>
                        <td>Pizzas</td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </table>

    </div>
@endsection

