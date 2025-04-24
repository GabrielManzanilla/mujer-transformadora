@extends('layouts.base')
@section('content')
<main class="flex flex-col items-center  min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
    <h1 class="text-2xl font-bold uppercase tracking-widest ">Personas Registradas</h1>
    <div class="relative overflow-x-auto p-4 rounded-lg shadow-md mb-4 bg-gray-100">
    <table class="w-full text-sm text-left text-black border border-gray-300 rounded-lg overflow-hidden">
        <thead class="text-xs uppercase bg-gray-200 text-black">
            <tr>
                <th scope="col" class="px-6 py-3">Apellido Paterno</th>
                <th scope="col" class="px-6 py-3">Apellido Materno</th>
                <th scope="col" class="px-6 py-3">Nombres</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">CURP</th>
                <th scope="col" class="px-6 py-3">Fecha de Nacimiento</th>
                <th scope="col" class="px-6 py-3">Sexo</th>
                <th scope="col" class="px-6 py-3">Teléfono</th>
                <th scope="col" class="px-6 py-3">Es Mayahablante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                        {{ $persona->str_apellido_paterno }}
                    </td>
                    <td class="px-6 py-4">{{ $persona->str_apellido_materno }}</td>
                    <td class="px-6 py-4">{{ $persona->str_nombre }}</td>
                    <td class="px-6 py-4">{{ $persona->str_correo_electronico }}</td>
                    <td class="px-6 py-4">{{ $persona->str_curp }}</td>
                    <td class="px-6 py-4">{{ $persona->dt_fecha_nacimiento }}</td>
                    <td class="px-6 py-4">{{ $persona->str_sexo }}</td>
                    <td class="px-6 py-4">{{ $persona->str_tel_celular }}</td>
                    <td class="px-6 py-4 text-center">
                        {{ $persona->bl_mayahablante ? 'Sí' : 'No' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</main>


@endsection