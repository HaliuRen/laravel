@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>   
@endsection

@section('content')
    {{-- {{$perfil}} --}}
    <h1 class="text-center">Editar Mi Perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form 
                action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Tu nombre"
                        value="{{ $perfil->usuario->name }}"
                    >

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">Sitio Web</label>

                    <input type="text"
                        name="url"
                        class="form-control @error('url') is-invalid @enderror"
                        id="url"
                        placeholder="Tu Sitio Web"
                        value="{{ $perfil->usuario->url }}"
                    >

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografía</label>

                    <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia}}">

                    <trix-editor 
                        input="biografia"
                        class="form-control @error('biografia') is-invalid @enderror"
                    ></trix-editor>
                    <!-- mostrando mensaje de validacion -->
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label for="imagen">Tu foto de perfil:</label>

                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    
                    @if( $perfil->imagen )
                        <div class="mt-4">
                            <p>Imagen actual:</p>

                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                        </div>

                        <!-- mostrando mensaje de validacion -->
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Actualizar Perfil">
                </div>

            </form>
        </div>
    </div>
    

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer referrerpolicy="no-referrer"></script>
@endsection