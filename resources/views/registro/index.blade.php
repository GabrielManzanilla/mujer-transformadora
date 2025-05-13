@extends('layouts.base')
@section('content')
    <main class="flex flex-col items-center w-full min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
        <h1 class="text-2xl font-bold uppercase tracking-widest ">Solicitudes Realizadas</h1>
        <a href="{{ route('form.register') }}" class="font-bold text-[#6D1528] hover:text-[#c2995c]">Crear Inscripcion</a>
        <div class="w-full overflow-x-auto p-4 rounded-lg  mb-4">
            <table class="text-sm w-full text-left text-black border border-gray-300 rounded-lg overflow-hidden">
                <thead class="text-center w-full text-xs uppercase bg-gray-200 text-black">
                    <tr>
                        <th scope="col" class="px-6 py-3">Razón Social</th>
                        <th scope="col" class="px-6 py-3">Nombre Comercial</th>
                        <th scope="col" class="px-6 py-3">Tiempo Ejerciendo</th>
                        <th scope="col" class="px-6 py-3">RFC</th>
                        <th scope="col" class="px-6 py-3">Clave IMPI</th>
                        <th scope="col" class="px-6 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registros as $registro)
                        <tr class="bg-white border-b border-gray-200" onclick="location.href='{{ route('show.register', $registro->pk_inscripcion_id) }}'">
                            <td class="px-6 py-4">{{ $registro->str_razon_social }}</td>
                            <td class="px-6 py-4">{{ $registro->str_nombre_comercial }}</td>
                            <td class="px-6 py-4">{{ $registro->dt_tiempo_ejerciendo }}</td>
                            <td class="px-6 py-4">{{ $registro->str_rfc }}</td>
                            <td class="px-6 py-4">{{ $registro->str_clave_impi }}</td>

                            <td class="px-6 py-4"><a href="{{ route('edit.register', $registro->pk_inscripcion_id) }}">Editar</a></td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b border-gray-200">
                            <td colspan="6" class="px-6 py-4 text-center">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>


@endsection