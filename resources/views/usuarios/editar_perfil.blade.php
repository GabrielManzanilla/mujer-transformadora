@extends('layouts.base')
@section('content')
<main class="flex flex-col items-center  min-h-screen py-6 sm:py-12 lg:py-24 bg-gray-100">
    <h1 class="text-2xl font-bold uppercase tracking-widest ">Perfil</h1>
    <form action="{{ route('make.update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="nombres" id="nombres" value="{{ $datosPersonales->str_nombre }}" class="border-2 border-gray-300 p-2 rounded-md mb-4" placeholder="Nombres">
        <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $datosPersonales->str_apellido_paterno }}" class="border-2 border-gray-300 p-2 rounded-md mb-4" placeholder="Nombres">
        <input type="text" name="apellido_materno" id="apellido_materno" value="{{ $datosPersonales->str_apellido_materno }}" class="border-2 border-gray-300 p-2 rounded-md mb-4" placeholder="Nombres">
        <input type="submit" value="Actualizar" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer hover:bg-blue-600 transition duration-300">
    </form>
    
</div>

</main>


@endsection