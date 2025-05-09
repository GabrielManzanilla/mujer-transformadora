@extends('layouts.base')
@section('content')
    <main class="flex flex-col items-center  min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
        <h1 class="text-2xl font-bold uppercase tracking-widest ">Perfil</h1>
        <h1>
            {{ isset($datosPersonales) ? trim("{$datosPersonales->str_nombre} {$datosPersonales->str_apellido_paterno} {$datosPersonales->str_apellido_materno}") : 'sin nombre' }}
        </h1>
        <a href="{{ route('archivo.ver', ['typefile' => 'foto_perfil', 'personaId' => $datosPersonales->pk_persona_id]) }}"
            target="_blank">
            <img src="{{ route('archivo.ver', ['typefile' => 'foto_perfil', 'personaId' => $datosPersonales->pk_persona_id]) }}"
            class="rounded-full w-32 h-32 object-cover mb-4">
                alt="foto perfil" </a>

            <h1>Estado Perfil: {{ $datosPersonales->estado_perfil }}</h1>
            <div>
            </div>

            </div>
            <a href="{{ route('actualizar.perfil') }}">Modificar</a>

            <a href="{{ route('archivo.ver', ['typefile' => 'acta_nacimiento', 'personaId' => $datosPersonales->pk_persona_id]) }}"
                target="_blank">
                Ver Acta de Nacimiento
            </a>
            <a href="{{ route('archivo.ver', ['typefile' => 'curp_file', 'personaId' => $datosPersonales->pk_persona_id]) }}"
                target="_blank">
                Ver CURP
            </a>
            <a href="{{ route('archivo.ver', ['typefile' => 'comprobante_domicilio', 'personaId' => $datosPersonales->pk_persona_id]) }}"
                target="_blank">
                Ver Comprobante Domicilio
            </a>
            <a href="{{ route('archivo.ver', ['typefile' => 'ine_file', 'personaId' => $datosPersonales->pk_persona_id]) }}"
                target="_blank">
                Ver INE
            </a>
    </main>


@endsection