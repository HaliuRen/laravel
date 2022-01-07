@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>   
@endsection

@section('content')
    
    <h2 class="text-center mb-5"> Crear nueva receta</h2>
    
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>

                    <input type="text"
                        name="titulo"
                        class="form-control"
                        id="titulo"
                        placeholder="Titulo Receta"
                        value={{ old('titulo') }}
                    >

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <!--mostrando las categorias-->
                <div class="form-group mt-3">
                    <label for="categoria">Categoria</label>
                    <!-- si hay un error en titulo aw lw agrega la clase is-invaled-->
                    <select 
                        name="categoria"
                        class="form-control @error('titulo') is-invalid @enderror"  
                        id="categoria"
                    >
                        <option value="">-- Seleccione una opción --</option>
                        @foreach($categorias as $categoria)
                            <option 
                                value="{{ $categoria->id }}" 
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                            >{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <!-- mostrando mensaje de validacion -->
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>

                    <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">

                    <trix-editor 
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    ></trix-editor>
                    <!-- mostrando mensaje de validacion -->
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>

                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">

                    <trix-editor 
                        input="ingredientes"
                        class="form-control @error('ingredientes') is-invalid @enderror"
                    ></trix-editor>
                    <!-- mostrando mensaje de validacion -->
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Elige una imagen</label>

                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    <!-- mostrando mensaje de validacion -->
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer referrerpolicy="no-referrer"></script>
@endsection