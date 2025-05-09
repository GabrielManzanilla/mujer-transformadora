@extends('layouts.base')
@section('content')
<main class="flex flex-col items-center  min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
    <h1 class="text-2xl font-bold uppercase tracking-widest ">Perfil</h1>
    <h1>
    {{ isset($datosPersonales) ? trim("{$datosPersonales->str_nombre} {$datosPersonales->str_apellido_paterno} {$datosPersonales->str_apellido_materno}") : 'sin nombre' }}
</h1>

    <h1>Estado Perfil: {{ $datosPersonales->estado_perfil }}</h1>
    <div>
    </div>
    
</div> 
<a href="{{ route('actualizar.perfil') }}">Modificar</a>

<a href="{{ route('archivo.ver', ['personaId' => $datosPersonales->pk_persona_id, 'typefile' => 'acta']) }}" target="_blank">
    Ver Acta de Nacimiento
</a>
</main>


@endsection