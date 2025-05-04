<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class datos_personales extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user =Auth::user();
        $datos = $user->perfil;
        return view('usuarios.perfil', ['datosPersonales' => $datos, 'credenciales' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( )
    {
        //
        $user =Auth::user();
        $datos = $user->perfil;
        return view('usuarios.editar_perfil', ['datosPersonales' => $datos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $user = Auth::user();

        $request->validate([
            'nombres' => 'nullable | string|max:50',
            'apellido_paterno' => 'nullable | string|max:50',
            'apellido_materno' => 'nullable | string|max:50',

        ]);

        if($user->perfil){
            $perfil=$user->perfil;
            $perfil->update([
                'str_nombre' => $request->nombres,
                'str_apellido_paterno' => $request->apellido_paterno,
                'str_apellido_materno' => $request->apellido_materno]);
         return redirect()->route('perfil');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
