@extends('layouts.base')
@section('content')
    <main class="flex flex-col items-center  min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
        <h1 class="text-2xl font-bold uppercase tracking-widest ">Personas Registradas</h1>
        <a href="{{ route('show.register') }}">Crear Inscripcion</a>
        <div class="relative overflow-x-auto p-4 rounded-lg shadow-md mb-4 bg-gray-100">
            <table class="w-full text-sm text-left text-black border border-gray-300 rounded-lg overflow-hidden">
                <thead class="text-xs uppercase bg-gray-200 text-black">
                    <tr>
                        <th scope="col" class="px-6 py-3">Razón Social</th>
                        <th scope="col" class="px-6 py-3">Nombre Comercial</th>
                        <th scope="col" class="px-6 py-3">Tiempo Ejerciendo</th>
                        <th scope="col" class="px-6 py-3">RFC</th>
                        <th scope="col" class="px-6 py-3">Clave IMPI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registros as $registro)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-6 py-4">{{ $registro->str_razon_social }}</td>
                            <td class="px-6 py-4">{{ $registro->str_nombre_comercial }}</td>
                            <td class="px-6 py-4">{{ $registro->dt_tiempo_ejerciendo }}</td>
                            <td class="px-6 py-4">{{ $registro->str_rfc }}</td>
                            <td class="px-6 py-4">{{ $registro->str_clave_impi }}</td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b border-gray-200">
                            <td colspan="5" class="px-6 py-4 text-center">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>


@endsection