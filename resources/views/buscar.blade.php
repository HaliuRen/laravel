
<!--sintaxis Blade para Vistas-->
<h1>buscar.blade.php</h1>

<!--Directiva PHP-->
@php
    $variable = 20;

@endphp

<!--Directiva IF-->
@if ( $variable ===20 )

    {{ "Si es 20" }}

@endif <!--Cerrando directiva if-->

<!--Mostrando el valor de una variable (el equivalente a echo-->
{{ $variable }}